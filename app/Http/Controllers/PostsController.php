<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts',[
            'posts' => Post::latest()->get(),
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Post $post)
    {
        return view('post',compact('post'));
    }

    public function edit(Post $post)
    {
    }

    public function update(Request $request, Post $post)
    {
    }

    public function destroy(Post $post)
    {
    }
}
