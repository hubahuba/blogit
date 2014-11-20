@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{{ $title }}}
        <small><i class="fa fa-paperclip"></i> Posts</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    {{ Form::open([
        'url' => URL::current()
    ]) }}
    <div class="row">
        <div class="col-lg-8 col-xs-12">
            <div class='box box-info'>
                <div class='box-body pad'>
                    <!--title-->
                    <div class="form-group">
                        <input type="text" name="p-title" placeholder="Post Title Here" class="form-control" />
                    </div>
                    <!--content-->
                    <textarea id="editor" name="p-content" rows="10" cols="80"></textarea>
                    <!--excerpt-->
                    <br>
                    <div class="form-group">
                        <textarea class="form-control" name="p-excerpt" rows="3" cols="80" placeholder="Post Excerpt Here (Max 200 Char.)"></textarea>
                    </div>
                </div>
            </div><!-- /.box -->
        </div><!-- ./col -->
        <div class="col-lg-4 col-xs-12">
            <!-- Publish -->
            <div class='box box-warning'>
                <div class='box-header'>
                    <h3 class='box-title'>
                        Publish
                    </h3>
                    <div class="pull-right box-tools">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save Changes</button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="dr">Draft</option>
                            <option value="pub">Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Privacy</label>
                        <select name="status" class="form-control">
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                        </select>
                    </div>
                </div>
            </div><!-- /.box -->
            <!-- Categories -->
            <div class='box box-success'>
                <div class='box-header'>
                    <h3 class='box-title'>
                        Categories
                    </h3>
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <div class="form-group">
                        <label>Select Category</label>
                        <select name="status" class="form-control" multiple>
                            <option value="dr">Draft</option>
                            <option value="pub">Publish</option>
                        </select>
                    </div>
                </div>
            </div><!-- /.box -->
            <!-- Feature Image -->
            <div class='box box-green'>
                <div class='box-header'>
                    <h3 class='box-title'>
                        Feature Image
                    </h3>
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block">Select Image</button>
                    </div>
                </div>
            </div><!-- /.box -->
        </div><!-- ./col -->
    </div><!-- /.row -->
    {{ Form::close() }}
</section><!-- /.content -->

@stop