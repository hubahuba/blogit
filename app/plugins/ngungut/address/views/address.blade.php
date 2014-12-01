@extends('nccms::layouts.admin')
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
                    'id' => 'aForm'
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
                    <div class="form-group{{{ $errors->first('aPhone') ? ' has-error':'' }}}">
                        <label>Phone</label>
                        <input type="text" name="aPhone" class="form-control" placeholder="Contact Phone" value="{{{ Input::old('aPhone') }}}" />
                        {{ $errors->first('aPhone') ? '<code>'.$errors->first('aPhone').'</code>':'' }}
                    </div>
                    <div class="form-group{{{ $errors->first('aFax') ? ' has-error':'' }}}">
                        <label>Fax</label>
                        <input type="text" name="aFax" class="form-control" placeholder="Contact Fax" value="{{{ Input::old('aFax') }}}" />
                        {{ $errors->first('aFax') ? '<code>'.$errors->first('aFax').'</code>':'' }}
                    </div>
                    <div class="form-group{{{ $errors->first('aEmail') ? ' has-error':'' }}}">
                        <label>Email</label>
                        <input type="text" name="aEmail" class="form-control" placeholder="Contact Email" value="{{{ Input::old('aEmail') }}}" />
                        {{ $errors->first('aEmail') ? '<code>'.$errors->first('aEmail').'</code>':'' }}
                    </div>
                    <div class="form-group{{{ $errors->first('aAddress') ? ' has-error':'' }}}">
                        <label>Address</label>
                        <textarea rows="4" name="aAddress" class="form-control" placeholder="Office Address">{{ Input::old('aAddress') }}</textarea>
                        {{ $errors->first('aAddress') ? '<code>'.$errors->first('aAddress').'</code>':'' }}
                    </div>
                    <div class="form-group{{{ $errors->first('aURL') ? ' has-error':'' }}}">
                        <label>Map Static URL</label>
                        <textarea rows="4" name="aURL" class="form-control" placeholder="Google Map Static URL">{{ Input::old('aURL') }}</textarea>
                        {{ $errors->first('aURL') ? '<code>'.$errors->first('aURL').'</code>':'' }}
                    </div>
                    <div class="form-group{{{ $errors->first('aStatus') ? ' has-error':'' }}}">
                        <label>Status</label>
                        <select name="aStatus" class="form-control">
                            <option value="pub">Publish</option>
                            <option value="dr">Draft</option>
                        </select>
                        {{ $errors->first('aStatus') ? '<code>'.$errors->first('aStatus').'</code>':'' }}
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="aID" id="aID" value="{{ Input::old('aID') }}" />
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
                                <th>Label</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($addresses[0]))
                                @foreach($addresses as $addr)
                            <tr>
                                <td>
                                    <a class="aEditor" href="javascript:;" data-label="{{ $addr['label'] }}" data-id="{{ $addr['id'] }}" data-company="{{ $addr['company'] }}" data-phone="{{ $addr['phone'] }}"
                                         data-fax="{{ $addr['fax'] }}" data-email="{{ $addr['email'] }}" data-address="{{ $addr['address'] }}" data-url="{{ $addr['map_url'] }}" data-status="{{ $addr['status'] }}">
                                        {{ $addr['label'] }}
                                    </a>
                                </td>
                                <td>{{ $addr['company'] }}</td>
                                <td>
                                    {{ Form::open([
                                        'url' => URL::current()
                                    ]) }}
                                    <input type="hidden" name="delete" value="1">
                                    <input type="hidden" name="theID" value="{{ $addr['id'] }}">
                                    <button class="btn btn-xs btn-danger" onclick="return confirm('Delete this address?');">delete</button>
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