<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
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
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $image = $request->image;
        $new_image = time() . $image->getClientOriginalName();
        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'image' => 'public/uploads/posts/' . $new_image,
            'slug' => Str::slug($request->title),
            'users_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        $image->move('public/uploads/posts/', $new_image);
        return redirect()->back()->with('success', 'Postingan Anda berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $posts = Post::findorfail($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('posts', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findorfail($id);

        if ($request->has('image')) {
            $image = $request->image;
            $new_image = time() . $image->getClientOriginalName();
            $image->move('public/uploads/posts/', $new_image);
            $post_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'image' => 'public/uploads/posts/' . $new_image,
                'slug' => Str::slug($request->title)
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->title)
            ];
        }

        $post->tags()->sync($request->tags);
        $post->update($post_data);

        return redirect()->route('post.index')->with('success', 'Postingan Anda berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();

        return redirect()->back()->with('delete', 'Post berhasil dipindahkan ke sampah! (Cek postingan yang dihapus di sampah');
    }

    public function tampil_sampah()
    {
        $posts = Post::onlyTrashed()->paginate(10);
        return view('admin.post.sampah', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success', 'Post berhasil dikembalikan! (Silahkan cek list post)');
    }

    public function burn($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('delete', 'Post berhasil dihapus permanen!');
    }
}
