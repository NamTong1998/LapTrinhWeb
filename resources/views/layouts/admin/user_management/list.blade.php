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
                        <a href="{{ route('admin_users_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New User </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="user_manager" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Profile Picture </th>
                                    <th> Username </th>
                                    <th> Name </th>
                                    <th> Gender </th>
                                    <th> Affiliation </th>
                                    <th> Phone </th>
                                    <th> Email </th>
                                    <th> Country </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                
                                <tr>
                                    <td> {{ $user->id }} </td>
                                    <td> <img style="width: 50px; height: auto;" src="{{ asset('/storage/'.$user->image) }}" /> </td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                    <td> {{ $user->gender }} </td>
                                    <td>{{ $user->affiliation }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->country }}</td>
                                    <td>

                                        @if( $user->id != Auth::user()->id )
                                        <form method="post" action="{{ route('admin_users_delete',['id'=> $user->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="delete_user_{{ $user->id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Are you sure to delete user named {{ $user->user_name }} ?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_user_{{ $user->id }}"><i class="fa fa-trash"></i></button>
                                        @else
                                        <i> Cannot delete yourself </i>
                                        @endif

                                        <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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