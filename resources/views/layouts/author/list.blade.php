@extends('layouts.author.layout')

@section('title','Author Management')

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

                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( Auth::user()->role_id === 1001 )

                                @foreach($author as $au)
                                <tr>

                                    <td> {{$au->id }} </td>
                                    
                                    <td> 
                                        {{ $au->summary }} 
                                        <p>
                                            @if($au->image !=null)
                                            <img src="{{asset('')}}upload/{{$au->image}}" width="100px" height="100px" /> 
                                            @endif
                                        </p>
                                    </td>
                                    <td> {!! $au->content !!} </td>
                                     <td>
                                        @if($au->video !=null)
                                            <video style="width: 120px; height: auto;" src="{{ asset('/storage/'.$au->video) }}" autobuffer autoplay="true" autoloop loop controls 
                                            poster="/images/video.png"> Format Unsupported </video>
                                        
                                        @endif
                                      </td>
                                    <td> 
                                        <a class="btn btn-primary" href="{{ route('author_edit', ['id' => $au->id]) }}"> <i class="fa fa-edit">  </i> </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('author_delete',['id'=> $au->id ]) }}" >
                                            @csrf
                                        <div class="modal fade" id="delete_author_{{ $au->id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Are you sure delete the category named {{ $au->summary }} ?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_author_{{ $au->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach

                                @elseif (Auth::user()->role_id === 1)

                                @foreach ( $author->where('user_id', Auth::user()->id) as $au )
                                <tr>

                                    <td> {{$au->id }} </td>
                                    
                                    <td> 
                                        {{ $au->summary }} 
                                        <p>
                                            @if($au->image !=null)
                                            <img src="{{asset('')}}upload/{{$au->image}}" width="100px" height="100px" /> 
                                            @endif
                                        </p>
                                    </td>
                                    <td> {!! $au->content !!} </td>
                                     <td>
                                        @if($au->video !=null)
                                            <video style="width: 120px; height: auto;" src="{{ asset('/storage/'.$au->video) }}" autobuffer autoplay="true" autoloop loop controls 
                                            poster="/images/video.png"> Format Unsupported </video>
                                        
                                        @endif
                                      </td>
                                    <td> 
                                        <a class="btn btn-primary" href="{{ route('author_edit', ['id' => $au->id]) }}"> <i class="fa fa-edit">  </i> </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('author_delete',['id'=> $au->id ]) }}" >
                                            @csrf
                                        <div class="modal fade" id="delete_author_{{ $au->id }}" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Are you sure delete the article named {{ $au->summary }} ?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_author_{{ $au->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach

                                @endif
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