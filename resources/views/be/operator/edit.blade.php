@extends('be.layouts.app')
@section('body-class', 'skin-blue sidebar-mini')
@section('content')
    <div class="content-wrapper" style="min-height: 990px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $admin->name }}
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
                            <h3 class="box-title">Edit admin</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" action="{{ route('operators.update', ['id' => $admin->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (\Illuminate\Support\Facades\Session::get('message'))
                                    <div class="form-group">
                                        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
                                    </div>
                                @endif
                                @if ($errors->first())
                                    <div class="form-group">
                                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                                    </div>
                            @endif
                            <!-- text input -->
                                <div style="display: flex; justify-content: center; margin-bottom: 10px; overflow: hidden;">
                                    <input type="file" name="ava" id="thumbnail" hidden accept="image/*">
                                    <div style="position: relative; width: 200px; height: 200px;">
                                        <img src="{{ $admin->ava }}" alt="" class="preview-img">
                                        <div class="hover-preview">
                                            <a href="#" id="triggerUpload"><i class="fa fa-upload"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" value="PUT" name="_method" hidden>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="*****" name="password">
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
