@extends('layouts.home.layout')

@section('content')
<div class="container">
    <div class="col-md-8">
        <fieldset class="form-border">
            <legend class="form-border">
                <h1>
                    My Profile
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
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-primary">
                            <div class="box box-default">
                                <div class="box-body box-profile">
                                    <div class="row">
                                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/storage/' . $user->image) }}" alt="My avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="profile-username text-center">{{ $user->user_name }}</h3>
                            </div>
                            <div class="box-body">
                                <h3 class="text-muted">                       
                                    About Me
                                </h3>
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <i class="fa fa-user text-info"></i> 
                                         Full Name
                                    </strong>
                                    <p class="text-muted">
                                        {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                                    </p>
                                    <hr>

                                    <strong>
                                        <i class="fa fa-user text-info"></i> 
                                        Initals
                                    </strong>
                                    <p class="text-muted">
                                        {{ $user->initals }}
                                    </p>
                                    <hr>

                                    <strong>
                                        <i class="fa fa-genderless text-info"></i>
                                        Gender
                                    </strong>
                                    <p class="text-muted">
                                        {{ $user->gender }}
                                    </p>
                                    <hr>

                                    <strong>
                                        <i class="fa fa-steam text-info"></i> 
                                        Affiliation
                                    </strong>
                                    <p class="text-muted">
                                        {{ $user->affiliation }}
                                    </p>
                                    <hr>
                                </div>
                            </div>

                            <div class="box-body">
                                <h3 class="box-title">                       
                                    Contact Me
                                </h3>
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <i class="fa fa-fw fa-phone text-info"></i>
                                         Phone
                                    </strong>
                                    <p class="text-muted">
                                        {{ $user->phone }}
                                    </p>
                                    <hr>

                                    <strong>
                                        <i class="fa fa-fw fa-fax text-info"></i>
                                         Fax
                                    </strong>
                                    <p class="text-muted">
                                        {{ $user->fax }}
                                    </p>
                                    <hr>

                                    <strong>
                                        <i class="fa fa-pencil margin-r-5 text-info"></i>
                                         Email
                                    </strong>
                                    <p class="text-muted">
                                        {{ $user->email }}
                                    </p>
                                    <hr>

                                    <strong>
                                        <i class="fa fa-map-marker margin-r-5 text-info"></i>
                                         Country
                                    </strong>
                                    <p class="text-muted">
                                        {{ $user->country }}
                                    </p>
                                    <hr>
                                </div>
                            </div>

                            <div class="box-body">
                                <h3 class="box-title">                       
                                    Other
                                </h3>
                                <div class="col-md-10 col-md-offset-1">
                                    <strong>
                                        <i class="fa fa-file-text-o margin-r-5 text-info"></i> Other
                                    </strong>
                                    <p class="text-muted">
                                        
                                    </p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="col-md-10 col-md-offset-1">
                                <a href="{{ route('home_profile_edit',$user->id )}}" class="btn btn-block btn-primary">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#activity" data-toggle="tab" aria-expanded="true">
                                        <strong>Activity</strong>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>
@endsection