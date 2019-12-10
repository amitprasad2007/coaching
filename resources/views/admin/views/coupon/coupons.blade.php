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
              <a href="{{route('packages.index')}}"><span><i class="pe-7s-box2"></i></span> All Packages</a>
            <a href="{{route('bookings.index')}}"><span><i class="pe-7s-graph2"></i></span> All Bookings</a>
            <a href="{{route('coupons.index')}}"><span><i class="pe-7s-box"></i></span> All Coupon Codes</a>
    </section>
    <section class="content-header">
     <ol class="breadcrumb">    </ol>
     <div class="col-md-12 text-right">
                    <a title="Add Coupon" href="{{ URL::to('coupons/create') }}" class="btn btn-action"><i class="fa fa-plus"></i> Add Coupon</a>
                                            
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="dashbar">
                
            </div>
            <div class="col-md-12">
                <div class="card"> 
                    <div class="header">Coupons</div>
                    <div class="content">
                        <div class="toolbar">
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                    <th width="3%">SL No</th>
                                        <th>Coupon</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Discount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($coupons)
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->validity_start_date}}</td>
                                        <td>{{$coupon->validity_end_date}}</td>
                                        
                                        <td>
                                            @if($coupon->discount_type == 1)
                                                {{'Rs. '.number_format($coupon->discount,2)}}
                                            @else
                                                {{$coupon->discount.' %'}}
                                            @endif
                                        </td>
                                        <td>
                                           @if($coupon->is_active == 0)
                                            <a title="Inactive" href="{{ URL::to('/coupons/change-status/'.$coupon->id) }}" class="text-success action like"><i class="fa fa-lock"></i></a>
                                            @else
                                            <a title="Active" href="{{ URL::to('/coupons/change-status/'.$coupon->id) }}" class="text-danger action like"><i class="fa fa-unlock"></i></a>
                                            @endif
                                            <a title="Edit" href="{!! URL::to('/coupons/'.$coupon->id.'/edit') !!}" class="text-primary action edit"><i class="fa fa-edit"></i></a>
                                            <a title="Remove" href="#" data-toggle="modal" data-target="#confirm-delete{{$coupon->id}}" class="text-danger action remove"><i class="fa fa-trash"></i></a>
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
                                                            {!! Form::open(['method' => 'post','route' => ['coupons.destroy', $coupon->id],'style'=>'display:inline']) !!}
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