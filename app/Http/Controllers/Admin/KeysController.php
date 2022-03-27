<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Key; //Eloquent エロクアント
use App\Models\KeyTag;
use App\Models\Tag;
use App\Models\TagDetailtag;
use App\Models\Detailtag;
use Illuminate\Support\Facades\DB; //QueryBuilder クエリビルダー
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Exists;

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
        $detailtags = Detailtag::where('admin_id', '=', \Auth::id())->orderBy('id', 'DESC')->get();

        return view(
            'admin.keys.create',
            compact('tags', 'detailtags')
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
        // dd($posts);

        // $request->validate([
        //     'key_1' => 'required|string|max:255',
        //     'content' => 'required|string',
        // ]);

        //  ===== ここからトランザクション開始======
        try {
            DB::transaction(function () use ($posts) {
                //  ===== キーの登録======
                $key = Key::insertGetId([
                    'key_1' => $posts['key_1'],
                    'key_2' => $posts['key_2'],
                    'key_3' => $posts['key_3'],
                    'key_4' => $posts['key_4'],
                    'note' => $posts['note'],
                    'content' => $posts['content'],
                    'admin_id' => Auth::id(),
                ]);
                //  ===== メインタグ======
                $tag_exists = Tag::where('name', '=', $posts['new_tag'])->exists();
                if (!empty($posts['new_tag']) && !$tag_exists) {
                    $tag = Tag::insertGetId([
                        'name' => $posts['new_tag'],
                        'admin_id' => Auth::id(),
                    ]);

                    KeyTag::insert([
                        'key_id' => $key,
                        'tag_id' => $tag,
                    ]);
                } else {
                    // if (!empty($posts['_detail'])) {
                    $tag = $posts['existing_tag'];
                    KeyTag::insert([
                        'key_id' => $key,
                        'tag_id' => $tag,
                    ]);
                    // }
                }
                //  ===== 詳細タグ======
                $detail_tag_exists = detailtag::where('name', '=', $posts['new_detail_tag'])->exists();
                if (!empty($posts['new_detail_tag']) && !$detail_tag_exists) {
                    $detailtag = Detailtag::insertGetId([
                        'name' => $posts['new_detail_tag'],
                        'admin_id' => Auth::id(),
                    ]);

                    TagDetailtag::insert([
                        'key_id' => $key,
                        'tag_id' => $tag,
                        'detailtag_id' => $detailtag,
                    ]);
                } else {
                    if (!empty($posts['existing_detail_tag'])) {
                        $detailtag = $posts['existing_detail_tag'];
                        TagDetailtag::insert([
                            'key_id' => $key,
                            'tag_id' => $tag,
                            'detailtag_id' => $detailtag,
                        ]);
                    }
                }
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        //  ===== ここでトランザクション終了======



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
        // $key = Key::findOrFail($id);

        $key = Key::select('keys.*', 'tags.id AS tag_id', 'detailtags.id AS detailtag_id',)
            ->leftJoin('key_tags', 'key_tags.key_id', '=', 'keys.id')
            ->leftJoin('tags', 'key_tags.tag_id', '=', 'tags.id')
            ->leftJoin('tag_detailtags', 'tag_detailtags.key_id', '=', 'keys.id')
            ->leftJoin('detailtags', 'tag_detailtags.detailtag_id', '=', 'detailtags.id')
            ->where('keys.id', '=', $id)
            ->findOrFail($id);
        // dd($key);
        // $include_tags = [];
        // foreach ($key_tag as $tag) {
        //     array_push($include_tags, $tag['tag_id']);
        // }
        $tags = Tag::where('admin_id', '=', \Auth::id())->orderBy('id', 'DESC')->get();
        $detailtags = Detailtag::where('admin_id', '=', \Auth::id())->orderBy('id', 'DESC')->get();

        // dd($tags);

        return view('admin.keys.edit', compact('key', 'tags', 'detailtags'));
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
        $posts = $request->all();
        try {
            DB::transaction(
                function () use ($posts, $id) {
                    //  ===== キーの編集======
                    $key = Key::findOrFail($id);
                    $key->key_1 =  $posts['key_1'];
                    $key->key_2 =  $posts['key_2'];
                    $key->key_3 =  $posts['key_3'];
                    $key->key_4 =  $posts['key_4'];
                    $key->note =  $posts['note'];
                    $key->content =  $posts['content'];
                    $key->save();
                    // ===== メインタグ======
                    KeyTag::where('key_id', '=', $id)->delete();
                    $tag_exists = Tag::where('name', '=', $posts['new_tag'])->exists();
                    if (!empty($posts['new_tag']) && !$tag_exists) {
                        $tag = Tag::insertGetId([
                            'name' => $posts['new_tag'],
                            'admin_id' => Auth::id(),
                        ]);
                        KeyTag::insert([
                            'key_id' => $id,
                            'tag_id' => $tag,
                        ]);
                    } else {
                        $tag = $posts['existing_tag'];
                        KeyTag::insert([
                            'key_id' => $id,
                            'tag_id' => $tag,
                        ]);
                    }
                    // ===== 詳細タグ======
                    TagDetailtag::where('key_id', '=', $id)->delete();
                    $detail_tag_exists = Detailtag::where('name', '=', $posts['new_detail_tag'])->exists();
                    if (!empty($posts['new_detail_tag']) && !$detail_tag_exists) {
                        $detailtag = Detailtag::insertGetId([
                            'name' => $posts['new_detail_tag'],
                            'admin_id' => Auth::id(),
                        ]);
                        TagDetailtag::insert([
                            'key_id' => $id,
                            'tag_id' => $tag,
                            'detailtag_id' => $detailtag,
                        ]);
                    } else {
                        if (!empty($posts['existing_detail_tag'])) {
                            $detailtag = $posts['existing_detail_tag'];
                            TagDetailtag::insert([
                                'key_id' => $id,
                                'tag_id' => $tag,
                                'detailtag_id' => $detailtag,
                            ]);
                        }
                    }
                }
            );
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

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
        KeyTag::where('key_id', '=', $id)->delete();
        TagDetailtag::where('key_id', '=', $id)->delete();
        Key::findOrFail($id)->delete();

        return redirect()
            ->route('admin.keys.index')
            ->with([
                'message' => 'キー情報を削除しました。',
                'status' => 'alert'
            ]);
    }
}
