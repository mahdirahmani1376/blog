<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

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
            'user_name' => ['required','max:255','min:3',Rule::unique('users','user_name')],
            'email' => ['required','email','max:255',Rule::unique('users','email')],
            'password' => ['required','max:255','min:7']
        ]);

        $user = User::create($data);

        auth()->login($user);

        return redirect(route('home'))->with('success','Your account has been created');
    }
}
