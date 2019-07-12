@extends('layouts.admin.layout')
@section('title','Video Management')

@section('css')
<link href="{{ asset('js/lib/summernote/dist/summernote.css') }}" rel="stylesheet">
<link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/bower_components/ckeditor/style.js') }}"></script>
@section('page-header')
Upload a New Video
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-md-4">
                <h3 class="box-title"></h3>
        </div>
        <div class="col-md-2 col-md-offset-6">
            <a href="{{ route('admin_video_list') }}" class="btn btn-block btn-info">
                Video List
            </a>
        </div>
    </div>
    <form method="post" action="{{ route('admin_video_store') }}" enctype= "multipart/form-data"  >
        @csrf
        <div class="box-body">

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="sum"> Title*: </label>
                <input id="sum" type="text" class="form-control" name="title" required value="{{ old('title')}}">
                @if ($errors->has('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label> Video</label>
                <input type="file" name="video" accept="video/*" class="form-control" />
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary"> Upload </button>
            </div>
        </div>

    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/lib/summernote/dist/summernote.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script><!-- làm select đẹp hơn -->
<script src="{{ asset('js/author/create.js') }}"></script>
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/bower_components/ckeditor/style.js') }}"></script>
<script>
    CKEDITOR.replace('content')
</script>
@endsection