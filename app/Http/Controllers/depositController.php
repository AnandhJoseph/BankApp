<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class depositController extends Controller
{
    public function depositPage(Request $request)
    {
        $user = Auth::user();

        $request->validate([

            'amount' => 'required|numeric|min:0.01',
        ]);

        $amount = $request->amount;
        $transaction = new Transaction([
            'transaction_type' => ('Credit'),
            'details' => ('Deposit'),
            'user_id' => Auth::id(),
            'amount' => $request->input('amount'),
            'balance' => ($user->balance + $request->input('amount')),
            'time' => now(),
        ]);
        $user->balance = $user->balance + $amount;
        $user->save();
        
        $transaction->save();

        return redirect('home')->with('success', 'Amount Has debited to your Account successfully.');
    }
}
