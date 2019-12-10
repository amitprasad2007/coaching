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
    <section class="content-header">
     <ol class="breadcrumb">    </ol>
     <div class="col-md-12 text-right">
                    <a title="Add Coupon" href="{{ URL::to('add-faculty') }}" class="btn btn-action"><i class="fa fa-plus"></i> Add Faculty</a>
                    <a title="Import Data" href="{{route('import_faculty')}}" class="btn btn-action"><i class="fa fa-download"></i> Import Faculty List</a>
                    <a title="Export Data" href="{{route('faculty.export_data')}}" class="btn btn-action"><i class="fa fa-upload"></i> Export Faculty List</a>
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="dashbar">
                
            </div>
            <div class="col-md-12">
                <div class="card"> 
                    <div class="header"><h2>Faculty List</h2></div>
                    <div class="content">
                        <div class="toolbar">
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                    <th >SL No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($data)
                                    @foreach($data as $coupon)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$coupon->name}}</td>
                                        <td>{{$coupon->email }}</td>
                                        <td>{{$coupon->phone_no}}</td>
                                        <td >
                                           @if($coupon->status == 1)
                                            <a title="active" href="{{ URL::to('faculty-status/'.$coupon->id) }}" class="text-success action like">Active</a>
                                            @else
                                            <a title="InActive" href="{{ URL::to('faculty-status/'.$coupon->id) }}" class="text-danger action like">In Active</a>
                                            @endif</td>
                                            <td  class="text-center"><a title="Edit" href="{!! URL::to('/faculty/'.$coupon->id.'/edit') !!}" class="btn btn-primary action edit">Edit</i></a>
                                            <a title="Remove" href="#" data-toggle="modal" data-target="#confirm-delete{{$coupon->id}}" class="btn btn-danger action remove">  Delete</a>
                                            <div class="modal fade" id="confirm-delete{{$coupon->id}}" role="dialog" style="text-align: left;">
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
                                                            {!! Form::open(['method' => 'post','route' => ['faculty.destroy', $coupon->id],'style'=>'display:inline']) !!}
                                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-fill btn-sm']) !!}
                                                            {!! Form::hidden('id',$coupon->id) !!}
                                                            <button type="button" class="btn btn-default btn-fill btn-sm" data-dismiss="modal">Cancel</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
</div>
</div>
@endsection