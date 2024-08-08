<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreationRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function home(Request $request)
    {
        $user = Auth::user();
        $data = User::all();
        return view('home', compact('user'));
    }


    public function deposit(Request $request)
    {
        $user = Auth::user();
        $data = User::all();
        return view('deposit', compact('user'));
    }

    public function withdraw()
    {
        return view('withdraw');
    }

    public function transfer()
    {
        return view('transfer');
    }

    public function statement()
    {
        $user = Auth::id();
        $transactions = Transaction::where('user_id', $user)->paginate(10);
        return view('statement', compact('transactions'));
    }
}
