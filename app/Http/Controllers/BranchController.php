<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\Payment;
use App\User;

use Auth;

class BranchController extends Controller
{
    //
    function dashboard()
    {
        $user_id = Auth::user()->id;
        $payouts = Payment::where('user_id', $user_id)->where('type', 'Payout')->get();
        $payins = Payment::where('user_id', '!=', $user_id)->where('type', 'Payout')->get();
        $incomes = Payment::where('user_id', $user_id)->where('type', 'Income')->get();
        $expenses = Payment::where('user_id', $user_id)->where('type', 'Expense')->get();
        $total_payout = 0;
        $total_payin = 0;
        $total_income = 0;
        $total_expense = 0;
        foreach ($payouts as $p) {
            $total_payout = $total_payout + $p->amount;
        }
        foreach ($payins as $p) {
            $total_payin = $total_payin + $p->amount;
        }
        foreach ($incomes as $p) {
            $total_income = $total_income + $p->amount;
        }
        foreach ($expenses as $p) {
            $total_expense = $total_expense + $p->amount;
        }
        $data['total_payout'] = $total_payout;
        $data['total_payin'] = $total_payin;
        $data['total_income'] = $total_income;
        $data['total_expense'] = $total_expense;

        return view('dashboard', $data);
    }
    function addTransferUI()
    {
        $data['label'] = Auth::user()->id;
        return view('Branch.AddTransfer', $data);
    }
    function post_transfer(Request $req)
    {
        $user_id = Auth::user()->id;
        $paymentss = Payment::get();
        $total_balace = Payment::orderBy('id', 'desc')->where('user_id', $user_id)->value('remaining_balance');
        if ($req->sending_amount > $total_balace) {
            return redirect()->back()->with('alert', 'Sorry! Your balance is lower than  amount!');
        }
        $image = '';
        $date = date('d-m-Y');
        if ($req->hasFile('file')) {
            $image = $req->file;
            $fileName = date('dmyhisa') . '-' . $image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $image->move('files/uploads/' . $date . '/', $fileName);
            $image = 'files/uploads/' . $date . '/' . $fileName;
        }

        $obj = new Transfer();
        $obj->sending_amount = $req->sending_amount;
        $obj->receiving_amount = $req->receiving_amount;
        $obj->sender_currency = $req->sender_currency;
        $obj->receiver_currency = $req->receiver_currency;
        $obj->sender_name = $req->sender_name;
        $obj->sender_address = $req->sender_address;
        $obj->sender_phone = $req->sender_phone;
        $obj->receiver_name = $req->receiver_name;
        $obj->receiver_address = $req->receiver_address;
        $obj->receiver_phone = $req->receiver_phone;
        $obj->receipt_image = $image;
        $obj->comment = $req->comment;
        $obj->user_id = $user_id;
        $obj->save();



        $new_balance = $total_balace + $req->sending_amount;
        $obj2 = new Payment();
        $obj2->amount = $req->sending_amount;
        $obj2->comment = $req->comment;
        $obj2->description = $req->comment;
        $obj2->user_id = $user_id;
        $obj2->remaining_balance = $new_balance;
        $obj2->transfer_id = $obj->id;
        $obj2->sender_name = $req->sender_name;
        $obj2->receiver_name = $req->receiver_name;
        $obj2->type = 'Payin';
        $obj2->save();
        return \Redirect::route('transfer_details', $obj->id)->with('alert', 'Data is added successfully!');
    }
    function update_transfer(Request $req)
    {
        $image = '';
        $date = date('d-m-Y');
        if ($req->hasFile('file')) {
            $image = $req->file;
            $fileName = date('dmyhisa') . '-' . $image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $image->move('files/uploads/' . $date . '/', $fileName);
            $image = 'files/uploads/' . $date . '/' . $fileName;
        }

        $transfer = Transfer::where('id', $req->id)->first();
        if ($transfer) {
            $user_id = Auth::user()->id;
            $paymentss = Payment::get();
            $total_balace = Payment::orderBy('id', 'desc')->where('user_id', $user_id)->value('remaining_balance');
            if ($req->receiving_amount > $total_balace) {
                return redirect()->back()->with('alert', 'Sorry! Your balance is lower than amount!');
            }

            Transfer::where('id', $req->id)
                ->update([
                    'amount_to_paid' => $req->amount_to_paid,
                    'receipt_image2' => $image,
                    'comment2' => $req->comment,
                    'status' => 'closed',
                ]);
            $new_balance = $total_balace - $req->amount_to_paid;
            $obj2 = new Payment();
            $obj2->amount = $req->amount_to_paid;
            $obj2->remaining_balance = $new_balance;
            $obj2->comment = $req->comment;
            $obj2->description = $req->comment;
            $obj2->user_id = $user_id;
            $obj2->type = 'Payout';
            $obj2->transfer_id = $req->id;
            $obj2->sender_name = $transfer->sender_name;
            $obj2->receiver_name = $transfer->receiver_name;
            $obj2->save();
            return redirect()->back()->with('alert', 'Data is updated successfully!');
        }
    }
    function transferListUI()
    {
        $user_id = Auth::user()->id;
        $data['user_id'] = Auth::user()->id;
        $data['total_balace'] = Payment::orderBy('id', 'desc')->where('user_id', $user_id)->value('remaining_balance');

        $data['user_transfers'] = Transfer::orderBy('id', 'desc')->where('user_id', $user_id)->get();
        $data['transfers'] = Transfer::orderBy('id', 'desc')->paginate(10);
        $data['currency'] = Auth::user()->label;
        $data['paymentss'] = Payment::get();
        return view('Branch.TransferList', $data);
    }
    function profile()
    {
        $user_id = Auth::user()->id;
        $data['user'] = User::where('id', $user_id)->first();

        return view('Branch.profile', $data);
    }
    function update_profile(Request $req)
    {
        $user_id = Auth::user()->id;
        $password = '';
        if ($req->id == '') {
            $password = Auth::user()->password;
        } else {
            $password = $req->password;
        }
        User::where('id', $user_id)
            ->update([
                'name' => $req->name,
                'email' => $req->email,
                'password' => $password,
            ]);
        return redirect()->back()->with('alert', 'Data is updated successfully!');
    }
    function transfer_details($id)
    {
        $data['user_id'] = Auth::user()->id;
        $transfer_user = Transfer::where('id', $id)->value('user_id');
        if (!$transfer_user) {
            return redirect()->back()->with('alert', 'Data not found on that parameter!');
        }
        $user_name = User::where('id', $transfer_user)->value('name');
        $data['user_name'] = $user_name;
        $data['transfer'] = Transfer::where('id', $id)->first();
        return view('Branch.FullfillTransfer', $data);
    }
    function branchTransactionUI()
    {
        $user_id = Auth::user()->id;
        $data1 = $user_id;
        $data2 = Payment::orderBy('id', 'desc')->where('user_id', $user_id)->value('remaining_balance');
        $data3 = Payment::orderBy('id', 'desc')->where('user_id', $user_id)->paginate(10);

        $data4 = Auth::user()->label;
        return view('Branch.BranchTransaction', ['user_id' => $data1, 'total_balace' => $data2, 'payments' => $data3, 'currency' => $data4]);
    }

}