@extends('layouts.admin.layout')
@section('title','User Management')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-md-4">
                <h3 class="box-title">Create New User</h3>
        </div>
        <div class="col-md-2 col-md-offset-6">
            <a href="{{ route('admin_users_list') }}" class="btn btn-block btn-info">
                <i class="fa fa-backward"></i> 
                User List
            </a>
        </div>
    </div>
    <form  method="post" action="{{ route('admin_users_store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
            <div class="form-group">
                <label for="name">{{ __('User Name') }}</label>
                <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" placeholder="Enter user name" value="{{ old('user_name') }}" required>

                @if ($errors->has('user_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('user_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="first_name">{{ __('First Name') }}</label>
                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" placeholder="Enter first name" value="{{ old('first_name') }}" required>

                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="middle_name">{{ __('Middle Name') }}</label>
                <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name"  placeholder="Enter middle name" value="{{ old('middle_name') }}">
            </div>

            <div class="form-group">
                <label for="last_name">{{ __('Last Name') }}</label>
                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"  placeholder="Enter last name" value="{{ old('last_name') }}" required>

                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="initals">{{ __('Initals') }}</label>
                <input id="initals" type="text" class="form-control{{ $errors->has('initals') ? ' is-invalid' : '' }}" name="initals"  placeholder="Enter initals" value="{{ old('initals') }}">

                @if ($errors->has('initals'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('initals') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="gender">{{ __('Gender') }}</label>
                <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender">
                    <option value="Male" selected="selected"> Male </option>
                    <option value="Female"> Female </option>
                    <option value="Other"> Other </option>
                </select>

                @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="affiliation">{{ __('Affiliation') }}</label>
                <input id="affiliation" type="text" class="form-control{{ $errors->has('affiliation') ? ' is-invalid' : '' }}" name="affiliation"  placeholder="Enter affiliation" value="{{ old('affiliation') }}" required>

                @if ($errors->has('affiliation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('affiliation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="is_admin">{{ __('Make Admin') }}</label>
                <select id="is_admin" type="text" class="form-control{{ $errors->has('is_admin') ? ' is-invalid' : '' }}" name="is_admin">
                    <option value="0"> No. DO NOT make this user a new admin. </option>
                    <option value="1"> Yes. MAKE this user a new admin. </option>
                </select>

                @if ($errors->has('is_admin'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('is_admin') }}</strong>
                    </span>
                @endif         
            </div>

            <div class="form-group">
                <label for="phone">{{ __('Phone') }}</label>
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  placeholder="Enter Phone" value="{{ old('phone') }}">

                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="fax">{{ __('Fax') }}</label>
                <input id="fax" type="text" class="form-control{{ $errors->has('fax') ? ' is-invalid' : '' }}" name="fax"  placeholder="Enter Fax" value="{{ old('fax') }}">

                @if ($errors->has('fax'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fax') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="country" >{{ __('Country') }}</label>
                <select class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" id="country" name="country" data-value="{{ old('country') }}">
                    @include('helper.country')
                </select>

                @if ($errors->has('country'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  placeholder="Enter email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter password" value="{{ old('password') }}" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            
            <div>
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter repeat password"required>
            </div>

        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
            </button>
        </div>
    </form>
</div>
@endsection
@section('js')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#country').select2();
            var countrySelected = $('#country').data('value');
            $('#country').val(countrySelected).trigger('change');
        });
    </script>
@endsection