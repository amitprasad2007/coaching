@extends("admin.layouts.layout_student")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")

<div class="content-wrapper">


<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Notifications</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item active">Recent Notifications</li>
    </div>
</ul>

<section class="updates">
    <div class="container-fluid">
        <div class="row">
            <!-- Recent Updates-->

           
            @if($notifications)
            @foreach($notifications as $notification)

            <div class="col-lg-10">
                <div class="recent-updates card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-10">
                                <h3>{{$notification->title}}</h3>
                                <p>{{$notification->message}}</p>
                            </div>
                            <div class="col col-2 date text-right">
                                <strong>{{date("d",strtotime($notification->created_at))}}</strong><span>{{date("M",strtotime($notification->created_at))}}</span>
                            </div>
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