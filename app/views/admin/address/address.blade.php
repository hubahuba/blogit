@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{{ $title }}}
        <small><i class="fa fa-map-marker"></i></small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-5 col-xs-12">
            <!-- Publish -->
            <div class='box box-warning'>
                <div class='box-header'>
                    <h3 class='box-title'>
                        Address Form
                    </h3>
                </div><!-- /.box-header -->
                {{ Form::open([
                    'url' => URL::current(),
                    'id' => 'cForm'
                ]) }}
                <div class='box-body pad'>
                    <div class="form-group{{{ $errors->first('aLabel') ? ' has-error':'' }}}">
                        <label>Label</label>
                        <input type="text" name="aLabel" class="form-control" placeholder="Label Name" value="{{{ Input::old('aLabel') }}}" />
                        {{ $errors->first('aLabel') ? '<code>'.$errors->first('aLabel').'</code>':'' }}
                    </div>
                    <div class="form-group{{{ $errors->first('aCompany') ? ' has-error':'' }}}">
                        <label>Company</label>
                        <input type="text" name="aCompany" class="form-control" placeholder="Company Name" value="{{{ Input::old('aCompany') }}}" />
                        {{ $errors->first('aCompany') ? '<code>'.$errors->first('aCompany').'</code>':'' }}
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="aPhone" class="form-control" placeholder="Contact Phone" value="{{{ Input::old('aPhone') }}}" />
                    </div>
                    <div class="form-group">
                        <label>Fax</label>
                        <input type="text" name="aFax" class="form-control" placeholder="Contact Fax" value="{{{ Input::old('aFax') }}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="aEmail" class="form-control" placeholder="Contact Email" value="{{{ Input::old('aEmail') }}}" />
                    </div>
                    <div class="form-group{{{ $errors->first('aAddress') ? ' has-error':'' }}}">
                        <label>Address</label>
                        <textarea rows="4" name="aAddress" class="form-control" placeholder="Office Address">{{ Input::old('aAddress') }}</textarea>
                        {{ $errors->first('aAddress') ? '<code>'.$errors->first('aAddress').'</code>':'' }}
                    </div>
                    <div class="form-group">
                        <label>Map Static URL</label>
                        <textarea rows="4" name="aURL" class="form-control" placeholder="Google Map Static URL">{{ Input::old('aURL') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="aStatus" class="form-control">
                            <option value="pub">Publish</option>
                            <option value="dr">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="aID" id="aID" />
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                {{ Form::close() }}
            </div><!-- /.box -->
        </div><!-- ./col -->
        <div class="col-lg-7 col-xs-12">
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>
                        Address List
                    </h3>
                </div><!-- /.box-header -->
                <div class='box-body table-responsive'>
                    <table id="cList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($categories[0]))
                                @foreach($categories as $category)
                            <tr>
                                <td>
                                    <a class="cEditor" href="javascript:;" data-name="{{ $category['name'] }}" data-id="{{ $category['id'] }}" data-desc="{{ $category['description'] }}" data-icon="{{ $category['icon'] }}">
                                        {{ $category['name'] }}
                                    </a>
                                </td>
                                <td>{{ $category['description'] }}</td>
                                <td>
                                    {{ Form::open([
                                        'url' => URL::current()
                                    ]) }}
                                    <input type="hidden" name="delete" value="1">
                                    <input type="hidden" name="theID" value="{{ $category['id'] }}">
                                    <button class="btn btn-xs btn-danger" onclick="return confirm('Delete this category?');">delete</button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div><!-- /.box -->
        </div><!-- ./col -->
    </div><!-- /.row -->
</section><!-- /.content -->

@stop