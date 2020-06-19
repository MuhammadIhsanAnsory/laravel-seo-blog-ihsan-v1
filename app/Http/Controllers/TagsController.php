<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name_tag' => 'required|min:3|max:20']);
        Tag::create([
            'name_tag' => $request->name_tag,
            'slug' => Str::slug($request->name_tag)
        ]);

        return redirect()->back()->with('success', 'Tag berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::findorfail($id);
        return view('admin.tag.edit', compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name_tag' => 'required|min:3|max:20']);

        $tag_data = [
            'name_tag' =>  $request->name_tag,
            'slug' => Str::slug($request->name_tag)
        ];

        Tag::whereId($id)->update($tag_data);

        return redirect()->route('tag.index')->with('success', 'Tag berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tag::findorfail($id);
        $tags->delete();
        return redirect()->back()->with('delete', 'Tag berhasil dihapus!');
    }
}
