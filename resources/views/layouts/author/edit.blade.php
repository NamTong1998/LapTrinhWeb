@extends('layouts.author.layout')
@section('title','Category Management')

@section('css')

@endsection

@section('page-header')
Create a New Category
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-md-4">
                <h3 class="box-title">Edit a Article</h3>
        </div>
        
    </div>
    <form method="post" action="{{ route('author_update', ['id' => $author->id] )}}">
        @csrf
        <div class="box-body">

            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label for="cat"> Category*: </label>
                <select class = "form-control {{ $errors->has('category') ? 'has-error' : '' }}" name = "category">
                    @foreach($categories as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }} </option> 
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="help-block">{{ $errors->first('category') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                <label for="sum"> Summary*: </label>
                <input id="sum" type="text" class="form-control" name="summary" required value="{{ $author->summary }}">
                @if ($errors->has('summary'))
                    <span class="help-block">{{ $errors->first('summary') }}</span>
                @endif
            </div>
            
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="cont"> Content*: </label>
                <input id="cont" type="text" class="form-control" name="content" required value="{{ $author->content }}">
                @if ($errors->has('content'))
                    <span class="help-block">{{ $errors->first('content') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label> Image</label>
                <input type="file" name= "image" class="form-control"  />
            </div>



            <div class="box-footer">
                <button type="submit" class="btn btn-primary"> Update </button>
            </div>
        </div>

    </form>
</div>
@endsection

@section('js')

@endsection