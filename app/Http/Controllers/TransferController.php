<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function transferPage(Request $request)
    {
        $request->validate([

            'email' => 'required | email|unique:users,email',
            'amount' => 'required|numeric',
        ]);
        $user = Auth::user();
        $data = User::all();

        if ($request->input('amount') > $user->balance) {

            return redirect('transfer')->with('success', 'Transaction can not be carrird out.
            Insufficient balance.');
        }

        $transaction = new Transaction([
            'transaction_type' => ('Debit'),
            'details' => $request->input('email'),
            'user_id' => Auth::id(),
            'amount' => $request->input('amount'),
            'balance' => ($user->balance + $request->input('amount')),
            'time' => now(),
        ]);
        $user->balance = $user->balance - $transaction->amount;

        $transaction->save();
        return redirect('home')->with('success', 'Transaction created successfully.');
    }
}
