<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Key; //Eloquent エロクアント
use App\Models\KeyTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB; //QueryBuilder クエリビルダー
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\Log;


class KeysController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $keys = Key::select('id', 'key_1', 'key_2', 'key_3', 'key_4', 'note', 'content')
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->get();
        return view(
            'admin.keys.index',
            compact('keys')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where('admin_id', '=', \Auth::id())->orderBy('id', 'DESC')->get();

        return view(
            'admin.keys.create',
            compact('tags')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = $request->all();

        $request->validate([
            'key_1' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        //  ===== ここからトランザクション開始======
        try {
            DB::transaction(function () use ($posts) {
                $key = Key::create([
                    'key_1' => $posts['key_1'],
                    'key_2' => $posts['key_2'],
                    'key_3' => $posts['key_3'],
                    'key_4' => $posts['key_4'],
                    'note' => $posts['note'],
                    'content' => $posts['content'],
                    'admin_id' => Auth::id(),
                ]);
                $tag_exists = Tag::where('name', '=', $posts['new_tag'])->exists();
                if (!empty($posts['new_tag']) || $posts['new_tag'] === "0" && !$tag_exists) {
                    $tag = Tag::create([
                        'name' => $posts['new_tag'],
                        'admin_id' => Auth::id(),
                    ]);

                    KeyTag::insert([
                        'key_id' => $key['id'],
                        'tag_id' => $tag['id'],
                    ]);
                }
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        //  ===== ここからトランザクション終了======



        return redirect()
            ->route('admin.keys.create')
            ->with([
                'message' => 'キー登録を実施しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $key = Key::findOrFail($id);
        return view('admin.keys.edit', compact('key'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $key = Key::findOrFail($id);
        $key->key_1 =  $request->key_1;
        $key->key_2 =  $request->key_2;
        $key->key_3 =  $request->key_3;
        $key->key_4 =  $request->key_4;
        $key->note =  $request->note;
        $key->content =  $request->content;
        $key->save();

        return redirect()
            ->route('admin.keys.index')
            ->with([
                'message' => 'キー情報を更新しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Key::findOrFail($id)->delete();

        return redirect()
            ->route('admin.keys.index')
            ->with([
                'message' => 'キー情報を削除しました。',
                'status' => 'alert'
            ]);
    }
}
