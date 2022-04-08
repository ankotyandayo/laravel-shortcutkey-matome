<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;



class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'admin.tags.index',
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Tag a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $edittag = Tag::select('tags.*')
            ->where('tags.id', '=', $id)
            ->findOrFail($id);
        // dd($edittag);
        return view('admin.tags.edit', compact('edittag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImageRequest $request, $id)
    {

        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            // Storage::putFile('public/tags', $imageFile); //リサイズなしの場合

            $fileNameToTag = ImageService::upload($imageFile, 'tags');
        }

        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $tag->filename = $fileNameToTag;
        }

        $tag->save();


        return redirect()
            ->route('admin.tags.index')
            ->with([
                'message' => 'タグ情報を更新しました。',
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
        //
    }
}
