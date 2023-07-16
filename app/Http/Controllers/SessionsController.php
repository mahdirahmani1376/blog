<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect(route('home'))->with('success', 'good bye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $data = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);

        if (!auth()->attempt($data)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }

        session()->regenerate();
        return redirect(route('home'))->with('success', 'welcome back');

    }
}
