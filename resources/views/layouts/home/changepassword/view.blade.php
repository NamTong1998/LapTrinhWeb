@extends('layouts.home.layout')
@section('css')
    <script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>
@endsection
@section('content')
<div class="container">
    <div class="col-md-8">
        <fieldset class="form-border">
            <legend class="form-border">
                <h1>
                    Change Password
                </h1>
            </legend>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form  method="POST" action="{{ route('home_changepassword_save') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">

                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 col-form-label text-md-right">
                            {{ __('Current Password') }}
                        </label>
                        <input id="current-password" type="password" class="form-control" name="current-password" placeholder="Enter current password" required>
                        @if ($errors->has('current-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 col-form-label text-md-right">
                            {{ __(' New Password') }}
                        </label>
                        <input id="new-password" type="password" class="form-control" name="new-password" placeholder="Enter new password" required>
                         @if ($errors->has('new-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="new-password-confirm" class="col-md-4 col-form-label text-md-right">
                            {{ __('Confirm Password') }}
                        </label>
                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" placeholder="Enter confirm password" required>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <br>
                            <!-- Google reCaptcha -->
                            <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                            <!-- End Google reCaptcha -->

                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                            <br>
                        </div>
                    </div>
                    
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-3">
                            <button type="submit" class="btn btn-primary btn-block rounded-0 py-2">
                                Change
                            </button>
                        </div>
                        <div class="col-md-2 col-md-offset-2">
                            <a href="{{ route('home_page') }}" class="btn btn-danger btn-block rounded-0 py-2">
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