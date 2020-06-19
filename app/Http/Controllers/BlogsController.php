<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(Post $post)
    {
        $categories = Category::all();
        $posts = $post->latest()->take(4)->get();
        return view('blog/landing', compact('posts', 'categories'));
    }

    public function read($slug)
    {
        $categories = Category::all();
        $posts = Post::where('slug', $slug)->get();
        return view('blog.read', compact('posts', 'categories'));
    }

    public function list()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(8);
        return view('blog.list', compact('posts', 'categories'));
    }

    public function list_category(Category $category)
    {
        $categories = Category::all();

        $posts = $category->posts()->paginate(8);
        return view('blog.list', compact('posts', 'categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $posts = Post::where('title', $request->keyword)->orWhere('title', 'like', '%' . $request->keyword . '%')->paginate(8);
        return view('blog.list', compact('posts', 'categories'));
    }
}
