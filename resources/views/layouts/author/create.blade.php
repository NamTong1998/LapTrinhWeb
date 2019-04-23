@extends('layouts.author.layout')
@section('title','Category Management')

@section('css')
<link href="{{ asset('js/lib/summernote/dist/summernote.css') }}" rel="stylesheet">
<link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
Create a Article
@endsection

@section('content')
<div class="box box-primary">
   
    <form method="post" action="{{ route('author_store') }}">
        @csrf
        <div class="box-body">

            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label for="cat"> Category*: </label>
                <select class = "form-control {{ $errors->has('category') ? 'has-error' : '' }}" name = "category">
                    @foreach($category as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }} </option> 
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="help-block">{{ $errors->first('category') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                <label for="sum"> Summary*: </label>
                <input id="sum" type="text" class="form-control" name="summary" required value="{{ old('summary')}}">
                @if ($errors->has('summary'))
                    <span class="help-block">{{ $errors->first('summary') }}</span>
                @endif
            </div>
            
            <div class="form-group {{ $errors->first('content') ? 'has-error' : ''}}">
                <label for="content"> Content*: </label>
                <textarea name="content" id="content" class="form-control" rows="10" placeholder="Enter content ..."> {{ old('content') }} </textarea>
                @if ($errors->has('content'))
                    <span class="help-block">{{ $errors->first('content') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label> Image</label>
                <input type="file" name= "image" class="form-control"  />
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary"> Create </button>
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
    CKEDITOR.replace('content');
</script>
@endsection