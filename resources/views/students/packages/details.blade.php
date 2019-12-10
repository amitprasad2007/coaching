@extends("admin.layouts.layout_student")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

@if($packages)
@foreach($packages as $package)
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Package Details</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{!! URL::to('student/packages') !!}">All Packages</a></li>
        <li class="breadcrumb-item active">{{$package->name}}</li>
    </div>
</ul>

<!-- all-packrages -->


<section class="updates">
    <div class="container-fluid">
        <div class="row">
            <!-- Recent Updates-->
            <div class="col-lg-4">
                <div class="recent-updates card">
                    <div class="card-body no-padding">
                        <!-- Item-->
                        <div class="item d-flex justify-content-between" style="padding: 10px;">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h5>Name</h5>
                                    <p style="color: #54e69d;">{{$package->name}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between" style="padding: 10px;">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h5>Subject</h5>
                                    <p style="color: #54e69d;">{{$package->subject_name}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Item        -->
                        <div class="item d-flex justify-content-between" style="padding: 10px;">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h5>No Of Papers</h5>
                                    <p style="color: #54e69d;">{{$package->no_of_papers}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between" style="padding: 10px;">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h5>Price</h5>
                                    <p style="color: #54e69d;">Rs. {{$package->price}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between" style="padding: 10px;">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h5>Validity</h5>
                                    <p style="color: #54e69d;">{{$package->validity}} Days</p>
                                </div>
                            </div>
                        </div>

                        <a href="javascript:void(0);" data-toggle="modal" data-target="#buy_modal" class="buy_now" style="">Purchase Now</a>
                        <div class="modal fade" id="buy_modal" role="dialog" style="text-align: left;">
                            <div class="modal-dialog" style="width: 35%;">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confirm Purchase</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>You are about to purchase this package <b><i class="title"></i></b> , after your confirmation we will take you to the payment gateway</p>
                                        <p>Do you want to proceed?</p>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="submit" class="btn btn-primary btn-ok" href="">Purchase</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="recent-updates card">

                    <div class="card-body no-padding">
                        <!-- Item-->
                        <div class="item d-flex justify-content-between">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h4>Overview</h4>
                                    <p>{{$package->overview}}</p>
                                </div>
                            </div>

                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h4>Benefit</h4>
                                    <p>{{$package->benifit}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@endif
</div>
@endsection 