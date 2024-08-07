<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function withdrawPage(Request $request)
    {
        $request->validate([

            'amount' => 'required|numeric',
        ]);

        $user = Auth::user();
        $data = User::all();

        if ($request->input('amount') > $user->balance) {

            return redirect('withdraw')->with('success', 'Transaction can not be carrird out.
            Insufficient balance.');
        } else {
            $transaction = new Transaction([
                'transaction_type' => ('Debit'),
                'details' => ('Withdraw'),
                'user_id' => Auth::id(),
                'amount' => $request->input('amount'),
                'balance' => ($user->balance - $request->input('amount')),
                'time' => now(),
            ]);
            $user->balance = ($user->balance - $request->input('amount'));
            $data->save();
        }

        $transaction->save();
        return redirect('home')->with('success', 'Transaction created successfully.');
    }
}
