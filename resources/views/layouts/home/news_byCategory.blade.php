@extends('layouts.home.layout')
@section('title','News in '.$category->name)
@section('css')

@endsection
@section('content')

<div class="col-md-12" style="margin-top: 50px; margin-left: -15px;">
	<div class="section-title">
		<h2 class="title"> Articles in <i style="color:red"> {{ $category->name }} </i> category </h2>
	</div>

	<div class="post post-row">
		@foreach($articles as $article)
		<h4 class="post-title"><a href="{{ route('home_newsDetail', ["id" => $article->id]) }}"> <i class="fa fa-tags"> </i> &nbsp;{{$article->summary}} </a></h4>
		@endforeach
	</div>
</div>

@endsection
@section('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c364861377e05c8"></script>
@endsection