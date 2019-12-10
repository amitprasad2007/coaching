@extends("admin.layouts.layout_student")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")

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
        <li class="breadcrumb-item"><a href="{!! URL::to('students/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{!! URL::to('students/mypackages') !!}">My Packages</a></li>
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
                        <!-- Item        -->
                        <div class="item d-flex justify-content-between" style="padding: 10px;">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h5>Exam Given</h5>
                                    <p style="color: #54e69d;">{{$package->exam_given}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between" style="padding: 10px;">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h5>Booking Date</h5>
                                    <p style="color: #54e69d;">{{date("d M Y",strtotime($package->booking_date))}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between" style="padding: 10px;">
                            <div class="info d-flex">
                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                <div class="title">
                                    <h5>Package Expires On</h5>
                                    <p style="color: #54e69d;">{{date("d M Y",strtotime($package->expire_date))}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="float: right;margin-right: 10px;">
                            <a href="javascript:void(0);" class="btn btn-secondary">View Result</a>
                            <a href="javascript:void(0);" class="btn btn-primary">Give Exam</a>
                            <!--<input type="submit" value="Update Profile" class="btn btn-primary">-->
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