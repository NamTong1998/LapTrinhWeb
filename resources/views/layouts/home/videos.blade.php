@extends('layouts.home.layout')
@section('title','All videos')
@section('css')

@endsection
@section('content')

<div class="col-md-12" style="margin-top: 50px; margin-left: -15px;">
	<div class="section-title">
		<h2 class="title"> All videos </h2>
	</div>

	<div class="post post-row">
		@foreach($videos as $video)
		<h4 class="post-title"><a href="{{ route('home_video_show', ["id" => $video->id]) }}"> <i class="fa fa-file-video-o"> </i> &nbsp;{{ $video->title }} </a></h4>
		@endforeach
	</div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c364861377e05c8"></script>
@endsection