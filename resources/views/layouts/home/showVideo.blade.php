@extends('layouts.home.layout')
@section('title', 'Playing '.$video->title)
@section('css')
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
@endsection
@section('content')

<div class="section-row">
	<h3><p style="font-family: 'Source Sans Pro', sans-serif"> {{ $video->title }}</p></h3>
	<div class="post-body">
		<ul class="post-meta">
			<li> 
				<video style="width: 96%; height: auto;" src="{{ asset('/storage/'.$video->path) }}" autobuffer autoplay="true" autoloop loop controls poster="/images/video.png"> Format Unsupported </video> 
            </li>
		</ul>
		
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c364861377e05c8"></script>
@endsection