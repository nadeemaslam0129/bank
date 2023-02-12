<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;

class ExpenseController extends Controller
{
    //
    function addExpense()
    {
        return view('Expense.add');
    }
    function postExpense(Request $req)
    {
        $user_id = Auth::user()->id;
        $paymentss = Payment::get();
        $total_balace = Payment::orderBy('id', 'desc')->where('user_id', $user_id)->value('remaining_balance');


        if ($req->amount > $total_balace) {
            return redirect()->back()->with('alert', 'Sorry! Your balance is lower than expense amount!');
        }
        $new_balance = $total_balace - $req->amount;
        $obj = new Payment();
        $obj->amount = $req->amount;
        $obj->remaining_balance = $new_balance;
        $obj->description = $req->description;
        $obj->comment = $req->comment;
        $obj->user_id = $user_id;
        $obj->type = 'Expense';
        $obj->save();
        return redirect()->back()->with('alert', 'Data is added successfully!');

    }
}