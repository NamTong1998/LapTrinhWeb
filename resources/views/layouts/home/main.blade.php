@extends('layouts.home.layout')

@section('title','Main Page')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('home/css/slider-main.css') }}" />
@endsection

@section('slide')
<div class="slider-container">
	<div class="slider">
	
	</div>
	<div class="slider__switch slider__switch--prev" data-ikslider-dir="prev">
		<span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.89 17.418c.27.272.27.71 0 .98s-.7.27-.968 0l-7.83-7.91c-.268-.27-.268-.706 0-.978l7.83-7.908c.268-.27.7-.27.97 0s.267.71 0 .98L6.75 10l7.14 7.418z"/></svg></span>
	</div>
	<div class="slider__switch slider__switch--next" data-ikslider-dir="next">
		<span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.25 10L6.11 2.58c-.27-.27-.27-.707 0-.98.267-.27.7-.27.968 0l7.83 7.91c.268.27.268.708 0 .978l-7.83 7.908c-.268.27-.7.27-.97 0s-.267-.707 0-.98L13.25 10z"/></svg></span>
	</div>
</div>
<div class="col-md-12" style="margin-top: 50px; margin-left: -15px;">
	<div class="section-title">
		<h2 class="title"><a href="">Giới thiệu hiệp hội</a></h2>
	</div>
	<div class="post post-row" ">
		<a class="post-img" href="blog-post.html"><img src="./img/post-13.jpg" alt=""></a>
		<div class="post-body">
			<div class="post-category">
				<a href="category.html">Travel</a>
				<a href="category.html">Lifestyle</a>
			</div>
			<h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
			<ul class="post-meta">
				<li><a href="author.html">John Doe</a></li>
				<li>20 April 2018</li>
			</ul>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="col-md-12" style="margin-bottom: 50px; margin-left: -15px;">
	<div class="section-title">
		<h2 class="title"><a href="">Tin tức nổi bật</a></h2>
	</div>

</div>

<div class="col-md-12" style="margin-bottom: 50px; margin-left: -15px;">
	<div class="section-title">
		<h2 class="title"><a href="">Sự kiện nổi bật</a></h2>
	</div>
	
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 khoito" >
			<div class="col-md-3 khoinho">
				Link
			</div>
			<div class="col-md-3 khoinho">
				Other Menu
			</div>
			<div class="col-md-3 khoinho">
				Contact us
			</div>
			<div class="col-md-3 khoinho">
				Facebook
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
<script src="{{ asset('home/js/slider-main.js') }}"></script>
@endsection
