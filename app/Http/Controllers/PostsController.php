<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'thumbnail' => ['required','image'],
            'slug' => ['required',Rule::unique('posts','slug')],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required',Rule::exists('categories','category_id')]
        ]);

        $data['user_id'] = auth()->id();
        $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        $post = Post::create($data);

        return redirect(route('home'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
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
