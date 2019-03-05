@extends('be.layouts.app')
@section('body-class', 'skin-blue sidebar-mini')
@section('content')
    <div class="content-wrapper" style="min-height: 1080px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable"
                                               role="grid" aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                                    ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                                    Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                                    Email
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                                    Avatar
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                                    Created at
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                                    Updated at
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach ($users as $user)
                                                <tr role="row" class="d-flex">
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <img src="{{ asset($user->ava) }}" alt="" style="height: 20%;">
                                                    </td>
                                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn-xs btn-success" style="padding: 5px 10px;"><i class="fa fa-pencil"></i></a>
                                                        <a href="#" data-id="{{ $user->id }}" class="btn-xs btn-danger btn-remove-user" style="padding: 5px 10px;"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@stop