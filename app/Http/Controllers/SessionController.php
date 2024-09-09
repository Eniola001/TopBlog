<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]
        );

        Auth::attempt($attributes);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages(
                ['password' => 'Invalid email or password']
            );
        }

        request()->session()->regenerate();

        return redirect('/blog')->with('success', 'Login successful!');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Log out successful!');
    }
}
