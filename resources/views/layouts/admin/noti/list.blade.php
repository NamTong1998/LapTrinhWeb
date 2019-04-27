@extends('layouts.admin.layout')

@section('title','Notification Management')

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
                        <h3 class="box-title"> Notification List </h3>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                        <a href="{{ route('admin_noti_allread') }}" class="btn btn-primary"><i class="fa fa-check"></i> Mark All as Read </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="user_manager" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Content </th>
                                    <th> Time </th>
                                    <th> Is Read </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notifications as $noti)
                                
                                <tr>
                                    <td> {{ $noti->id }} </td>
                                    <td> {{ $noti->head }} {{ $noti->body }} {{ $noti->tail }} </td>
                                    <td> {{ $noti->created_at }} </td>
                                    <td>
                                        @if( $noti->is_read == 1 )
                                        <b style="color: green;"> &#10004; </b>
                                        @elseif( $noti->is_read == 0 )
                                        <a class="btn btn-primary" href="{{ route('admin_noti_read', ["id" => $noti->id]) }}"> <i class="fa fa-check-square-o"> </i> </a>
                                        @endif
                                    </td>
                                    <td> <a class="btn btn-danger" href="{{ route('admin_noti_delete',["id" => $noti->id]) }}"> <i class="fa fa-trash">  </i> </a> </td>
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