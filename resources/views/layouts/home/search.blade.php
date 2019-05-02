@extends('layouts.home.layout')
@section('title','Search results for '.$search)
@section('css')

@endsection
@section('content')

<div class="col-md-12" style="margin-top: 50px; margin-left: -15px;">
	<div class="section-title">
		<h2 class="title"> Search results for  <i style="color:red"> {{ $search }} </i>  </h2> 
	</div>

	<b> <i style="font-size: 16px; color: black;"> Result: {{ $count }} found for <i style="font-size: 19px; color: red;"> " {{ $search }} " </i> </i> </b>

	<div class="post post-row">
		@foreach($results as $result)
		<h4 class="post-title"><a href="{{ route('home_newsDetail', ["id" => $result->id]) }}"> <i class="fa fa-tags"> </i> &nbsp;{{$result->summary}} </a></h4>
		@endforeach

		@foreach($results2 as $result2)
		<h4 class="post-title"><a href="{{ route('home_video_show', ["id" => $result2->id]) }}"> <i class="fa fa-file-video-o"> </i> &nbsp;{{ $result2->title }} </a></h4>
		@endforeach
	</div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c364861377e05c8"></script>
@endsection