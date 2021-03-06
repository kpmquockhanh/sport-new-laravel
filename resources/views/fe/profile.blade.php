@extends('fe.layouts.app')

@section('content')
    <section class="contact-area mb-80 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="section-heading style-2">
                        <h4>My profile</h4>
                        <div class="line"></div>
                    </div>
                    <div class="d-flex justify-content-center">
{{--                        <img src="{{ asset('backend/img/user2-160x160.jpg') }}" alt="">--}}
                    </div>
                    <div class="contact-form-area mt-50">
                        <form action="{{ route('user.update') }}" method="post">
                            @csrf
                            @if ($errors->first())
                                <div class="form-group">
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                </div>
                            @endif
                            @if (\Illuminate\Support\Facades\Session::get('message'))
                                <div class="form-group">
                                    <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control text-dark" id="email" disabled value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="repassword">RePassword</label>
                                <input type="password" class="form-control" id="repassword" name="password_confirmation">
                            </div>
                            <button class="btn vizew-btn mt-30" type="submit">Update</button>
                        </form>
                    </div>
                </div>
                {{--<div class="col-12 col-md-5 col-lg-4">--}}
                    {{--<div class="sidebar-area">--}}

                        {{--<div class="single-widget newsletter-widget mb-50">--}}

                            {{--<div class="section-heading style-2 mb-30">--}}
                                {{--<h4>Newsletter</h4>--}}
                                {{--<div class="line"></div>--}}
                            {{--</div>--}}
                            {{--<p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>--}}

                            {{--<div class="newsletter-form">--}}
                                {{--<form action="#" method="post">--}}
                                    {{--<input type="email" name="nl-email" class="form-control mb-15" id="emailnl" placeholder="Enter your email">--}}
                                    {{--<button type="submit" class="btn vizew-btn w-100">Subscribe</button>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="single-widget add-widget">--}}
                            {{--<a href="#"><img src="img/bg-img/add.png" alt=""></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
@stop
