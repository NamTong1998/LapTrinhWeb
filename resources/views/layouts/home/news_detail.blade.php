@extends('layouts.home.layout')
@section('title', $article->summary)
@section('css')
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
@endsection
@section('content')

<div class="section-row">
	<h3><p style="font-family: 'Source Sans Pro', sans-serif"> {{ $article->summary }}</p></h3>
	<div class="post-body">
		<ul class="post-meta">
			<li>{{ $article->user->user_name }}</li>
			<li>{{ $article->created_at }}</li>
			<li> 
				@if($article->video !=null)
                <video style="width: 96%; height: auto;" src="{{ asset('/storage/'.$article->video) }}" autobuffer autoplay="true" autoloop loop controls poster="/images/video.png"> Format Unsupported </video>
                @else
                <img src="{{asset('')}}upload/{{$article->image}}" width=600px height=auto  alt="">
                @endif
            </li>
		</ul>
		<br/>
		{!! $article->content !!}
	</div>
</div>

<div class="section-row">
	<div class="section-title">
		<h3 class="title"> Comments</h3>
	</div>

	<div  style="overflow-y: scroll; height: 210px;">

		<div class="post-comments">
	        @foreach( $comment as $cm)
	      
			<!-- comment -->
			<div class="media">
				
				<div class="media-body">
					<div class="media-heading">

						<img style="width: 30px; height:auto;" src="{{ asset('/storage/'.$cm->user->image) }}" alt="">
						<h4 class="text-primary">{{ $cm->user->user_name }}</h4>
						<span class="time"> {{ $cm->created_at }} </span>

					</div>
					<p>{{ $cm->content }}</p>
					@if( $cm->user_id === Auth::user()->id )
						<form method="post" action="{{ route('admin_comment_update', ['id'=> $cm->id ]) }}">
                            @csrf
                            <div class="modal fade" id="edit_comment_{{ $cm->id }}" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
									<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <textarea class="form-control" name="content"> {{ $cm->content }} </textarea>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"> Save </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_comment_{{ $cm->id }}"> Edit </button>

						<a class="btn btn-danger" href="{{ route('home_newsDetail_comment_delete', ["id" => $cm->id]) }}"> Delete </a>
					@endif

					<h4> -------------------------------------------------------------------- </h4>
				</div>
			</div>
			
			@endforeach
		</div>
	</div>
</div>
@if(!empty(Auth::id()))
<div class="section-row">
	<div class="section-title">
		<h3 class="title"> <small>Leave a reply</small></h3>
	</div>
	<form class="post-reply" action="{{ route('admin_comment_store') }}" method="post">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<input type="hidden" name="article_id" value="{{ $article->id }}">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<textarea class="input" name="content" placeholder="Comment..." required></textarea>
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