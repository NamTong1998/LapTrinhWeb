@extends('layouts.home.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="col-md-8">
        <fieldset class="form-border">
            <legend class="form-border">
                <h1>
                    Update User Information
                </h1>
            </legend>
            @if (session('errors'))
                <div class="alert alert-danger">
                    {{ session('errors') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form  method="POST" action="{{ route('home_profile_update',['id'=> $user->id ]) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="col-md-4 col-md-offset-4">
                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('/storage/' . $user->image) }}" alt="My avatar">
                                <input type="file" id="image" name="image" accept="image/*" />
                                
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('User Name') }}</label>
                        <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" placeholder="Enter user name" value="{{ $user->user_name }}" required>

                        @if ($errors->has('user_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="first_name">{{ __('First Name') }}</label>
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" placeholder="Enter first name" value="{{ $user->first_name }}" required>

                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="middle_name">{{ __('Middle Name') }}</label>
                        <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name"  placeholder="Enter middle name" value="{{ $user->middle_name }}">
                    </div>

                    <div class="form-group">
                        <label for="last_name">{{ __('Last Name') }}</label>
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"  placeholder="Enter last name" value="{{ $user->last_name }}" required>

                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="initals">{{ __('Initals') }}</label>
                        <input id="initals" type="text" class="form-control{{ $errors->has('initals') ? ' is-invalid' : '' }}" name="initals"  placeholder="Enter initals" value="{{ $user->initals }}">

                        @if ($errors->has('initals'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('initals') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="gender">{{ __('Gender') }}</label>
                        <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender">
                            <option value="" {{ $user->gender == 'null' ? 'selected' : '' }}></option>
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>female</option>
                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>

                        @if ($errors->has('gender'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="affiliation">{{ __('Affiliation') }}</label>
                        <input id="affiliation" type="text" class="form-control{{ $errors->has('affiliation') ? ' is-invalid' : '' }}" name="affiliation"  placeholder="Enter affiliation" value="{{ $user->affiliation }}" required>

                        @if ($errors->has('affiliation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error->first('affiliation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('Phone') }}</label>
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  placeholder="Enter Phone" value="{{ $user->phone }}">

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="fax">{{ __('Fax') }}</label>
                        <input id="fax" type="text" class="form-control{{ $errors->has('fax') ? ' is-invalid' : '' }}" name="fax"  placeholder="Enter Fax" value="{{ $user->fax }}">

                        @if ($errors->has('fax'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fax') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="country" >{{ __('Country') }}</label>
                        <select class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" id="country" name="country" data-value="{{ $user->country }}">
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
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  placeholder="Enter email" value="{{ $user->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-block rounded-0 py-2">
                                Update
                            </button>
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <a href="{{ route('home_profile_view') }}" class="btn btn-danger btn-block rounded-0 py-2">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
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