@extends('layouts.reviewer.layout')

@section('title','Reviewer Management')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                >
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="user_manager" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> ID</th>
                                    <th> Summary </th>
                                    <th> Content </th>
                                    <th> Video</th>
                                    <th> Qualification </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($articles as $art)
                                <tr>
                                    <td> {{ $art->id }} </td>
                                    <td> 
                                        {{ $art->summary }} 
                                        <p>
                                            @if($art->image !=null)
                                            <img src="{{ asset('upload/'.$art->image) }}" width="100px" height="100px" /> 
                                            @endif
                                        </p>
                                    </td>
                                    <td> {{ $art->content }} </td>
                                    <td>
                                        @if($art->video != null)
                                        <video style="width: 120px; height: auto;" src="{{ asset('/storage/'.$art->video) }}" autobuffer autoplay="true" autoloop loop controls 
                                        poster="/images/video.png"> Format Unsupported </video>
                                        @endif 
                                    </td>
                                    <td> 
                                        @if($art->is_qualified == 1)
                                        <a class="btn btn-primary" href="{{ route('reviewer_change', ['id' => $art->id]) }}"> Shown </a>
                                        @elseif($art->is_qualified == 0)
                                        <a class="btn btn-danger" href="{{ route('reviewer_change', ['id' => $art->id]) }}"> Not Shown </a>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('reviewer_delete',['id'=> $art->id ]) }}" >
                                            @csrf
                                            <div class="modal fade" id="delete_art_{{ $art->id }}" role="dialog">
                                                <div class="modal-dialog">

                                                <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Are you sure delete the article named {{ $art->summary }} ?</h4>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_art_{{ $art->id }}"><i class="fa fa-trash"></i></button>
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