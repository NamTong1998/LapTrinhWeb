@extends('layouts.admin.layout')

@section('title','User Management')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title">User List</h3>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                        <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Create New User </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="user_manager" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Name</th>
                                    <th>Affiliation</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Login Ability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->affiliation }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->country }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#}"><i class="fa fa-trash"></i></button>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#user_manager').DataTable();
        });
    </script>
@endsection