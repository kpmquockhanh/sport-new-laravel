@extends('be.layouts.app')
@section('body-class', 'hold-transition login-page')
@section('title', 'Login admin')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>Login Admin</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Welcome back!</p>

            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
@stop