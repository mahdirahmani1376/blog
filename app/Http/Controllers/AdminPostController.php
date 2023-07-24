<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatePost();

        $data['author_id'] = auth()->id();

        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = now()->format('Y_m_d_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('public/thumbnails', $fileName);
            $data['thumbnail'] = $fileName;
        }

        $post = Post::create($data);

        return redirect(route('home'))->with('success', 'post_created_successfully');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validatePost($post);

        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = now()->format('Y_m_d_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('public/thumbnails', $fileName);
            $data['thumbnail'] = $fileName;
        }

		$post->update($data);

        return back()->with('success','Post Updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success','Post Deleted!');
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function validatePost(?Post $post=null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => ['required'],
            'thumbnail' => $post->exists ? ['image'] : ['image','required'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
