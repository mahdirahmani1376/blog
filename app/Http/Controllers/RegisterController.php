<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'max:255'],
            'user_name' => ['required','max:255','min:3'],
            'email' => ['required','email','max:255'],
            'password' => ['required','max:255','min:7']
        ]);

        User::create($data);

        return redirect(route('home'));
    }
}
