<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class depositController extends Controller
{
    public function depositPage(Request $request, User $user)
    {
        $user = Auth::user();
        $request->validate([

            'amount' => 'required|numeric|min:0.01',
        ]);

        $transaction = new Transaction([
            'transaction_type' => ('Credit'),
            'details' => ('Deposit'),
            'user_id' => Auth::id(),
            'amount' => $request->input('amount'),
            'balance' => ($user->balance + $request->input('amount')),
            'time' => now(),
        ]);
        // 'balance' => ($user->balance + $request->input('amount')),
        // ]);
        $user->update([
            'balance' => ($user->balance + $request->input('amount')),
        ]);
        $transaction->save();
        return redirect('home')->with('success', 'Transaction created successfully.');
    }
}
