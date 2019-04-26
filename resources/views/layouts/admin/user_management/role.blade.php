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
                    
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="user_manager" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Username </th>
                                    <th> Name </th>
                                    <th> Is Admin </th>
                                    <th> Role </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                
                                <tr>
                                    <td> {{ $user->id }} </td>
                                    <td> {{ $user->user_name }} </td>
                                    <td> {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }} </td>
                                    <td>
                                        @if( $user->is_admin === 1 )
                                        <i> Already an Admin </i>
                                        @else
                                        <form method="post" action="{{ route('admin_users_setAdmin',['id'=> $user->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="setAdmin_user_{{ $user->id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Are you sure to make user {{ $user->user_name }} a new Admin?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setAdmin_user_{{ $user->id }}"><i class="fa fa-thumbs-o-up"> {{ __('Make Admin') }} </i></button>
                                    </td>>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin_users_setRole',['id'=> $user->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="setRole_user_{{ $user->id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Set Role for {{ $user->user_name }}</h4>
                                                  </div>
                                                  <select style="width: 100%;" class="form-control" name="role_id">
                                                    @foreach( $roles as $role )
                                                        @if( $role->id === $user->role_id )
                                                        <option value="{{ $role->id }}" selected="selected"> {{ $role->name }}</option>
                                                        @else
                                                        <option value="{{ $role->id }}"> {{ $role->name }}</option>
                                                        @endif
                                                    @endforeach
                                                  </select>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        @if( $user->role_id != 1000 )
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setRole_user_{{ $user->id }}"><i class="fa fa-odnoklassniki"> {{ $user->role->name }} </i></button>
                                        @else
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setRole_user_{{ $user->id }}"> Normal User </button>
                                        @endif
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