@extends('layouts.admin')
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
        <div class="col-md-4 col-xs-6">
            <div class="small-box bg-blue dropdown notifications-menu" style="min-height: 116px;">
                <div class="inner">
                    <img class="img-rounded" src="{{{ ($media['thumbnail']) ? $media['thumbnail']:asset('img/file.png') }}}" style="vertical-align: top; width: 100px;" />
                </div>
                <div class="icon" style="top: 3px; right: 10px; color: #FFFFFF;">
                    <h4>{{{ $media['realname'] }}}</h4>
                    <p>{{{ $media['type'] }}}</p>
                </div>
                @if(!$media['thumbnail'] && !$media['medium'])
                <a href="javascript:;" class="small-box-footer" onclick="javascript:setImage('{{{ $media['thumbnail'] }}}')">
                    Add <i class="fa fa-arrow-circle-right"></i>
                </a>
                @else
                <a href="#" class="small-box-footer dropdown-toggle" data-toggle="dropdown">
                    Add <i class="fa fa-arrow-circle-right"></i>
                </a>
                <ul class="dropdown-menu">
                    @if($media['thumbnail'])
                    <li><a href="javascript:;" onclick="javascript:setImage('{{{ $media['thumbnail'] }}}')">Thumbnail Size</a></li>
                    @endif
                    @if($media['medium'])
                    <li><a href="javascript:;" onclick="javascript:setImage('{{{ $media['medium'] }}}')">Medium Size</a></li>
                    @endif
                    @if($media['large'])
                    <li><a href="javascript:;" onclick="javascript:setImage('{{{ $media['large'] }}}')">Origin Size</a></li>
                    @endif
                </ul>
                @endif
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