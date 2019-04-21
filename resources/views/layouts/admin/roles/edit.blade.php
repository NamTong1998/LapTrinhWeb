@extends('layouts.admin.layout')
@section('title','Role Management')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('page-header')
Edit an existing Role
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-md-4">
                <h3 class="box-title">Edit this Contact Type</h3>
        </div>
        <div class="col-md-2 col-md-offset-6">
            <a href="{{ route('admin_role_list') }}" class="btn btn-block btn-info">
                Role List
            </a>
        </div>
    </div>

    <form method="post" action="{{ route('admin_role_update', ["id" => $role->id]) }}">
        @csrf
        <div class="box-body">

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name"> Name*: </label>
                <input id="name" type="text" class="form-control" name="name" required value="{{ $role->name }}">
                @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary"> Update </button>
        </div>
    </form>
</div>
@endsection

@section('js')

@endsection