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
                <h3 class="box-title">Create a New Category</h3>
        </div>
        <div class="col-md-2 col-md-offset-6">
            <a href="{{ route('admin_category_list') }}" class="btn btn-block btn-info">
                Category List
            </a>
        </div>
    </div>
    <form method="post" action="{{ route('admin_category_store') }}">
        @csrf
        <div class="box-body">

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name"> Name*: </label>
                <input id="name" type="text" class="form-control" name="name" required value="{{ old('name')}}">
                @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary"> Create </button>
            </div>
        </div>

    </form>
</div>
@endsection

@section('js')

@endsection