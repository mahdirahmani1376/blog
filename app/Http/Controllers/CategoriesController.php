<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('posts.index',[
           'posts' => Post::latest()->get(),
           'categories' => Category::all()
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Category $category)
    {
        return view('posts.show',[
           'posts' => $category->posts,
           'currentCategory' => $category,
            'categories' => $category::all()
        ]);
    }

    public function edit(Category $category)
    {
    }

    public function update(Request $request, Category $category)
    {
    }

    public function destroy(Category $category)
    {
    }
}
