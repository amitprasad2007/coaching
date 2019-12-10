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
                    
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>

        <h1>
           Booking
        </h1> 

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="header">Bookings</div>
                    <div class="content">             
                        <div class="toolbar">
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Package Name</th>
                                        <th>User Name</th>
                                        <th>Phone No</th>
                                        <th>Booking Date</th>
                                        <th>Package Cost</th>
                                        <th>Validity</th>
                                        <th>Transaction Id</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($bookings)
                                    @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$booking->package_name}}</td>
                                        <td>{{$booking->name}}</td>
                                        <td>{{$booking->phone_number}}</td>
                                        <td>{{date("d-M-Y",strtotime($booking->booking_date))}}</td>
                                        <td>Rs. {{$booking->package_price}}</td>
                                        <td>{{$booking->package_validity }} Days</td>
                                         <td>{{$booking->transaction_id}}</td>
                                        <td>
                                            @if($booking->is_paid == 1)
                                            {{"Paid"}}
                                            @else
                                            {{"Not Paid"}}
                                            @endif
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
@endsection