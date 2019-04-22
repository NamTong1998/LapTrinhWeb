@extends('layouts.admin.layout')
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
        <div class="col-md-2 col-md-offset-6">
            <a href="{{ route('admin_article_list') }}" class="btn btn-block btn-info">
                Article List
            </a>
        </div>
    </div>
    <form method="post" action="{{ route('admin_article_update', ['id' => $article->id] )}}">
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
                <input id="sum" type="text" class="form-control" name="summary" required value="{{ $article->summary }}">
                @if ($errors->has('summary'))
                    <span class="help-block">{{ $errors->first('summary') }}</span>
                @endif
            </div>
            
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="cont"> Content*: </label>
                <input id="cont" type="text" class="form-control" name="content" required value="{{ $article->content }}">
                @if ($errors->has('content'))
                    <span class="help-block">{{ $errors->first('content') }}</span>
                @endif
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