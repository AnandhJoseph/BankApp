<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserCreateController extends Controller
{
    public function doCreate(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'max:250'],
            'password' => ['required', Password::min(6)],

        ]);

        $user = User::create($attribute);
        Auth::login($user);
        return redirect('login');
    }
}
