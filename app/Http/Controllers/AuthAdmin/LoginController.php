<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('be.auth.login');
    }

    public function login(Request $request)
    {
        $credential = $this->getCredentials($request);

        if (Auth::guard('admin')->attempt($credential, $request->get('remember'))) {
            return redirect()->intended('/admin');
        }
        return  $this->showLoginForm()->withErrors([
            'message' => 'These credentials do not match our records.'
        ]);
    }

    private function getCredentials(Request $request)
    {
        return $request->only([
            'email', 'password'
        ]);
    }

    public function logout()
    {
        $this->guard()->logout();

        return redirect(route('admin.login'));
    }
}
