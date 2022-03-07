<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Key; //Eloquent エロクアント
use Illuminate\Support\Facades\DB; //QueryBuilder クエリビルダー
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class KeysController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // $date_now = Carbon::now();
        // $date_parse = Carbon::parse(now());
        // echo $date_now->year;
        // echo $date_parse;

        // $e_all = Key::all();
        // $q_get = DB::table('keys')->select('key_1', 'key_2', 'key_3', 'key_4', 'note', 'content', 'created_at')->get();
        // $q_first = DB::table('keys')->select('name')->first();

        // $c_test = collect([
        //     'key_1' => 'Ctrl'
        // ]);

        // var_dump($q_first);

        // dd($e_all, $q_get, $q_first, $c_test);

        $keys = Key::select('id', 'key_1', 'key_2', 'key_3', 'key_4', 'note', 'content', 'created_at')->get();
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
        return view('admin.keys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'key_1' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Key::create([
            'key_1' => $request->key_1,
            'key_2' => $request->key_2,
            'key_3' => $request->key_3,
            'key_4' => $request->key_4,
            'note' => $request->note,
            'content' => $request->content,
            'admin_id' => Auth::id(),
        ]);

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
