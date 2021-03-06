<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $viewData = [
            'auth' => Auth::guard('admin')->user()
        ];

        return view('be.index')->with($viewData);
    }
}
