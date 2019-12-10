@extends("admin.layouts.layout_student")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")

<div class="content-wrapper">

<!-- Page Header-->
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">All Packages</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item active">My Packages</li>
    </div>
</ul>

<!-- all-packrages -->
<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!--loop-section-->
            @if($packages)
            @foreach($packages as $package)
            <div class="col-lg-3">
                <div class="client card">
                    <div class="card-body text-center">
                        <div class="client-avatar"><img src="{!! asset('users_image/package.png') !!}" alt="..." class="img-fluid rounded-circle" width="100%">
                        </div>
                        <div class="client-title">
                            <h3>{{$package->name}}</h3><span style="color:#2b3d51">{{$package->subject_name}}</span>
                            <span style="color:#ef5285">Expires {{date("d M Y",strtotime($package->expire_date))}}</span>
                            <a href="{!! URL::to('student/mypackages/'.$package->id.'/details') !!}">View Package</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @endif
        </div>
    </div>
</section>


</div>
@endsection	
