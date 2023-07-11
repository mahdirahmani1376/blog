<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function userPosts(User $author)
    {
        return view('posts.index',[
           'posts' =>  $author->posts
        ]);
    }
}
