@extends('be.layouts.app')
@section('body-class', 'skin-blue sidebar-mini')
@section('style')
    <style>
        td {
            line-height: 50px !important;
        }
    </style>
@stop
@section('content')
    <div class="content-wrapper" style="min-height: 1080px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin
                <small>list</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List of admins</h3>
                            <a href="{{ route('operators.create') }}" class="btn-sm btn-success" style="margin-left: 10px;"><i class="fa fa-plus"></i></a>
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
                                                    Description
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

                                            @foreach ($admins as $admin)
                                                <tr role="row" class="d-flex" data-id="{{ $admin->id }}">
                                                    <td>{{ $admin->id }}</td>
                                                    <td>{{ $admin->name }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td><i>{{ $admin->desc ??'Empty' }}</i></td>
                                                    <td>
                                                        <div style="margin: auto; display: flex; justify-content: center; align-items: center">
                                                            <img src="{{ asset($admin->ava) }}" alt="" style="height: 50px;">
                                                        </div>
                                                    </td>
                                                    <td>{{ $admin->created_at->diffForHumans() }}</td>
                                                    <td>{{ $admin->updated_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="#" class="btn-xs btn-primary" style="padding: 5px 10px;"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('operators.edit', ['id' => $admin->id]) }}" class="btn-xs btn-success" style="padding: 5px 10px;"><i class="fa fa-pencil"></i></a>
                                                        <a href="#" class="btn-xs btn-danger btn-remove-admin" style="padding: 5px 10px;"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        {{ $admins->links() }}
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
