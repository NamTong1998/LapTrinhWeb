@extends('layouts.home.layout')
@section('title','News Detail')
@section('css')

@endsection
@section('content')

<div class="section-row">
	<h3>{{ $newsDetail->title }}</h3>
	<div class="post-body">
		<ul class="post-meta">
			<li>{{ $newsDetail->createdBy->user_name }}</li>
			<li>{{ \Carbon\Carbon::parse($newsDetail->created_at)->format('d/m/Y') }}</li>
			@foreach($newsDetail->categoryLinks as $categoryLink)
			   <li><a href="{{ route('home-news_category',['slug'=>$categoryLink->category->slug]) }}">{{ $categoryLink->category->name }}</a></li>
			@endforeach
		</ul>
		<br>
		{!! $newsDetail->body !!}
	</div>
</div>
@if(!empty($tags))
<div class="section-row">
	<div class="post-tags">
		<ul>
			<li>TAGS:</li>
			@foreach($tags as $tag)
			  <li><a href="{{ route('home-news_tag',['tag'=>$tag]) }}">{{ $tag }}</a></li>
			@endforeach  
		</ul>
	</div>
</div>
@endif
<div class="section-row">
	<div class="section-title">
		<h3 class="title">{{ $sizeComment }} Comments</h3>
	</div>
	<div class="post-comments">
        @foreach( $comments as $comment)
        @if($comment->status=='approved')
		<!-- comment -->
		<div class="media">
			<div class="media-left">
				<img class="media-object" src="{{ asset('storage/'.$comment->createdBy->image) }}" alt="">
			</div>
			<div class="media-body">
				<div class="media-heading">
					<h4>{{ $comment->createdBy->user_name }}</h4>
					<span class="time">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
				</div>
				<p>{{ $comment->body }}</p>
			</div>
		</div>
		<!-- /comment -->
		@endif
		@endforeach
	</div>
</div>
@if(!empty(Auth::id()))
<div class="section-row">
	<div class="section-title">
		<h3 class="title">Leave a reply</h3>
	</div>
	<form class="post-reply" action="{{ route('admin_comment_store') }}" method="post">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<input type="hidden" name="news_id" value="{{ $idNews }}">
					<textarea class="input" name="comment" placeholder="Comment" required></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<button class="primary-button">Submit</button>
			</div>

		</div>
	</form>
</div>
@endif
@endsection
@section('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c364861377e05c8"></script>
@endsection