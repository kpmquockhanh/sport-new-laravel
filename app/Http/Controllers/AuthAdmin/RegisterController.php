<?php

namespace App\Http\Controllers\AuthAdmin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends \App\Http\Controllers\Auth\RegisterController
{

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function showRegistrationForm()
    {
        return view('fe.auth.register');
    }
}
