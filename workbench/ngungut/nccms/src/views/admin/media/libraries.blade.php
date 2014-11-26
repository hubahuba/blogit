@extends('nccms::layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{{ $title }}}
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        @if(isset($libraries[0]))
            @foreach($libraries as $media)
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-blue" style="min-height: 116px;">
                <div class="inner">
                    <img class="img-rounded" src="{{{ ($media['thumbnail']) ? $media['thumbnail']:asset('img/file.png') }}}" style="vertical-align: top; width: 100px;" />
                </div>
                <div class="icon" style="top: 3px; right: 10px; color: #FFFFFF;">
                    <h4>{{{ $media['realname'] }}}</h4>
                    <p>{{{ $media['type'] }}}</p>
                </div>
                <a href="{{ URL::to('media/edit/'.$media['id']) }}" class="small-box-footer">
                    Edit <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
            @endforeach
        @else
        <div class="col-lg-12 col-xs-12">
            <p>No Media Found.</p>
        </div><!-- ./col -->
        @endif
    </div><!-- /.row -->

</section><!-- /.content -->

@stop