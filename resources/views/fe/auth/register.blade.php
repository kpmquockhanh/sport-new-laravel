@extends('fe.layouts.app')

@section('content')
    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Nice to meet you!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            @if ($errors->first())
                                <div class="form-group">
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="RePassword" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn vizew-btn w-100 mt-30">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->
@stop
