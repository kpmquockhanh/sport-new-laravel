<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends \App\Http\Controllers\Auth\LoginController
{

    public function guard()
    {
        return Auth::guard('admin');
    }


    public function showLoginForm()
    {
        return view('fe.auth.login');
    }
}
