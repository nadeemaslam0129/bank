<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class authController extends Controller
{
    function login()
    {
        $data['active'] = '';
        if (Auth::guard('user')->check()) {
            return Redirect::to('dashboard');

        }
        return view('login');
    }

    function postAdminLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::guard('user')->attempt(['email' => $email, 'password' => $password], true)) {
            return Redirect::to('/dashboard');
        } else {
            return redirect()->back()->with('alert', 'Incorrect Login Details');

        }

    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->to('/');
    }

}