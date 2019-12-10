@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")
<div class="content-wrapper">
    <section class="content-header">
    <ol class="breadcrumb">    </ol>
       
            
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="dashbar">
                <div class="col-md-12 text-right">
                    <a title="Add News" href="{{route('addfacultytype')}}" class="btn btn-action"><i class="fa fa-plus"></i> Add Faculty Type</a>
                     <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card"> 
                    <div class="header"><h2> Faculty Type</h2></div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>SL No</th>
                                        <th width="600px">Type</th>
                                        <th>Status</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php $slno = 1; @endphp
                                    @if($data)
                                    @foreach($data as $data)
                                    <tr>    
                                        <td>{{$slno}}</td>
                                        <td>{{ucfirst($data->type)}}</td>
                                         <td> @if($data->status == 1)
                                            <a href="{{ URL::to('faculty-type/'.$data->id) }}" class="btn btn-success" data-id="">Active</a>
                                            @else
                                            <a href="{{ URL::to('faculty-type/'.$data->id) }}" class="btn btn-danger" data-id="">InActive</a>
                                            @endif</td>
                                            <td> 
                                            <a title="Remove" href="#" data-toggle="modal" data-target="#confirm-delete{{$data->id}}" class="btn btn-danger" ></i>Delete</a>
                                            </td>
                                        <div class="modal fade" id="confirm-delete{{$data->id}}" role="dialog" style="text-align: left;">
                                                <div class="modal-dialog" style="width: 35%;">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Confirm Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>You are about to delete <b><i class="title"></i></b> record, this procedure is irreversible.</p>
                                                            <p>Do you want to proceed?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(array('route' => ['faculty-type/destroy',$data->id],'method'=>'post')) !!}
                                                            {!! Form::hidden('id',$data->id) !!}
                                                            <button type="submit" class="btn btn-danger btn-ok" href="">Delete</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </tr>
                                    <?php $slno = $slno + 1; ?>    
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection