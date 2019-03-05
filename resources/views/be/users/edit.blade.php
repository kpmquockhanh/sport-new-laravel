@extends('be.layouts.app')
@section('body-class', 'skin-blue sidebar-mini')
@section('content')
    <div class="content-wrapper" style="min-height: 990px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $user->name }}
                <small>edit</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-6 col-md-offset-3">
                    <!-- general form elements disabled -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit user</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @if (\Illuminate\Support\Facades\Session::get('message'))
                                    <div class="form-group">
                                        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
                                    </div>
                                @endif
                                <!-- text input -->
                                <div style="display: flex; justify-content: center">
                                    <img src="{{ asset($user->ava) }}" alt="" style="width: 100%;margin: 20px;">
                                </div>
                                    <input type="text" value="PUT" name="_method" hidden>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="*****" name="password">
                                </div>
                                <div class="form-group">
                                    <label>Repassword</label>
                                    <input type="password" class="form-control" placeholder="*****" name="password_confirmation">
                                </div>

                                <button class="btn btn-success">Update</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop