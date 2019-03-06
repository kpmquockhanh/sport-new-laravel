@extends('be.layouts.app')
@section('body-class', 'skin-blue sidebar-mini')
@section('style')
    <link href="{{ asset('backend/components/froala/css/froala_style.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/components/froala/css/froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet" type="text/css" />

    <style>
        a[href='https://www.froala.com/wysiwyg-editor?k=u'] {
            display: none !important;
        }
    </style>
@stop
@section('content')
    <div class="content-wrapper" style="min-height: 990px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create News
                {{--<small></small>--}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Edit News
                                {{--<small>make creative</small>--}}
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                {{--<button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"--}}
                                        {{--title="Remove">--}}
                                    {{--<i class="fa fa-times"></i></button>--}}
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <div id="editor">
                                <form action="{{ route('news.update', ['id' => $new->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" value="PUT" name="_method" hidden>
                                    <div class="row" style="display: flex; align-items: center">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ old('title', $new->title) }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                                                <input type="file" name="thumbnail" id="thumbnail" hidden accept="image/*">
                                                <div style="position: relative; width: 200px; height: 200px;">
                                                    <img src="{{ old('thumbnail', $new->thumbnail) }}" alt="" class="preview-img">
                                                    <div class="hover-preview">
                                                        <a href="#" id="triggerUpload"><i class="fa fa-upload"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea name="content">{{ old('content', $new->content) }}</textarea>

                                    <button class="btn btn-success" style="margin-top: 10px;">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@stop

@section('script')
    <script src="{{ asset('backend/components/froala/js/froala_editor.pkgd.min.js') }}"></script>
    <script>
        $(function() { $('textarea').froalaEditor({}) });
    </script>
@stop
