@extends('layouts.admin.layout')

@section('title','Video Management')

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
                        <h3 class="box-title">Video List</h3>
                    </div>
                   
                    <div class="col-md-2 col-md-offset-6">
                        <a href="{{ route('admin_video_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Upload New Video </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="user_manager" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Title </th>
                                    <th> Video </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $videos as $video )
                                <tr>
                                    <td> {{ $video->id }} </td>
                                    <td>
                                        {{ $video->title }} 
                                        <br/>
                                        <form method="post" action="{{ route('admin_video_update',['id'=> $video->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="edit_video_{{ $video->id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Are you sure to edit the title video number {{ $video->id }} ?</h4>
                                                    <input class="form-control" name="title" value="{{ $video->title }}"/>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_video_{{ $video->id }}"><i class="fa fa-edit"></i> &nbsp;Edit Title </button>
                                    </td>
                                    <td> 
                                        <video style="width: 350px;" src="{{ asset('/storage/'.$video->path) }}" controls> Unsupported </video>
                                    </td>
                                    <td> 
                                        <form method="post" action="{{ route('admin_video_delete',['id'=> $video->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="delete_video_{{ $video->id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Are you sure to delete the video number {{ $video->id }} ?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_video_{{ $video->id }}"><i class="fa fa-trash"></i></button>
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