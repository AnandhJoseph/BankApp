<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function dologin(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(4)],
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, email does not match our records.',
            ]);
        }

        $request->session()->regenerate();
        return redirect()->route('home');
    }
    public function logout()
    {
        auth()->guard()->logout();
        return view('login');
    }
}
