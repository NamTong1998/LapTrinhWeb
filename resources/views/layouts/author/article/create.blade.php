@extends('layouts.author.layout')

@section('title', 'Article Creation')

@section('css')
<link href="{{ asset('js/lib/summernote/dist/summernote.css') }}" rel="stylesheet">
<link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
Create a New Article
@endsection

@section('content')
<form method="post" action="">
	@csrf
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3> Create a new Article </h3>
		</div>

		<div class="box-body">
			<div class="form-group {{ $errors->first('summary') ? 'has-error' : ''}}">
				<label for="summary"> Summary*: </label>
				<input class="form-control" type="text" name="summary" id="summary" required value="{{ old('summary')}}">
				@if ($errors->has('summary'))
                    <span class="help-block">{{ $errors->first('summary') }}</span>
                @endif
			</div>

			<div class="form-group {{ $errors->first('category') ? 'has-error' : ''}}">
				<label for="category"> Category*: </label>
				<select class="form-control" name="category" id="category">
					@foreach($acs as $ac)
						<option value="{{ $ac->id }}"> {{ $ac->name }} </option>
					@endforeach
				</select>
			</div>

			<div class="form-group {{ $errors->first('content') ? 'has-error' : ''}}">
                <label for="content"> Content*: </label>
                <textarea name="content" id="content" class="form-control" rows="10" placeholder="Enter content ..."> {{ old('content') }} </textarea>
                @if ($errors->has('content'))
                    <span class="help-block">{{ $errors->first('content') }}</span>
                @endif
            </div>

            <div class="form-group">
				<label for="image"> Image*: </label>
				<input class="form-control" type="file" accept="file_extension|image/*" name="image" id="image">
			</div>
		</div>

		<div class="box-footer">
                <button type="submit" class="btn btn-primary"> Create </button>
            </div>
	</div>
</form>
@endsection

@section('js')
<script src="{{ asset('js/lib/summernote/dist/summernote.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/author/create.js') }}"></script>
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/bower_components/ckeditor/style.js') }}"></script>
<script>
	CKEDITOR.replace('content');
</script>
@endsection