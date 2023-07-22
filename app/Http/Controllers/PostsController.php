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
        $a = 2;
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
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);

        $data['author_id'] = auth()->id();

        if ($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $fileName =  now()->format('Y_m_d_H_i_s'). '_' . $file->getClientOriginalName();
            $file->storeAs('public/thumbnails',$fileName);
            $data['thumbnail'] = $fileName;
        }

        $post = Post::create($data);

        return redirect(route('home'))->with('success','post_created_successfully');
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
