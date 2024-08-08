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
        $user = Auth::user();
        $request->validate([

            'email' => 'required | email',
            'amount' => 'required|numeric',
        ]);

        $mailto = User::where('email', $request->email)->first();

        if (!$mailto) {
            return redirect('transfer')->with('mailmessage', 'Can not send to that mail.Invalid  mail');
        }

        if ($request->email === Auth::user()->email) {
            return redirect('transfer')->with('mailmessage', 'Can not send to Your on mail');
        }

        if ($request->input('amount') > $user->balance) {

            return redirect('transfer')->with('mailmessage', 'Transaction can not be carrird out.
            Insufficient balance.');
        } else {
            $transaction = new Transaction([
                'transaction_type' => ('Debit'),
                'details' => $request->input('email'),
                'user_id' => Auth::id(),
                'amount' => $request->input('amount'),
                'balance' => ($user->balance - $request->input('amount')),
                'time' => now(),
            ]);
            $user->balance = ($user->balance - $request->input('amount'));
            $user->save();
        }

        $transaction->save();

        $user2 = User::where('email', $request->email)->first();


        $transaction2 = new Transaction([
            'transaction_type' => ('Credit'),
            'details' => $request->email,
            'user_id' => $user2->id,
            'amount' => $request->amount,
            'balance' => ($user2->balance + $request->amount),
            'time' => now(),
        ]);
        $transaction2->save();
        $user2->balance = ($user2->balance - $request->input('amount'));
        $user2->save();



        return redirect('home')->with('success', 'Amount Has credited from your Account successfully.');
    }
}
