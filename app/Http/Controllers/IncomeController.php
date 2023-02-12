<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;

class IncomeController extends Controller
{
    //
    function addIncomeUI()
    {
        return view('Income.add');
    }
    function postIncome(Request $req)
    {
        $user_id = Auth::user()->id;
        $previous_balance = Payment::orderBy('id', 'desc')->where('user_id', $user_id)->value('remaining_balance');
        $new_balance = $req->amount + $previous_balance;
        $obj = new Payment();
        $obj->amount = $req->amount;
        $obj->remaining_balance = $new_balance;
        $obj->description = $req->description;
        $obj->comment = $req->comment;
        $obj->user_id = $user_id;
        $obj->type = 'Income';
        $obj->save();
        return redirect()->back()->with('alert', 'Data is added successfully!');

    }
}