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
        <h2 class="no-margin-bottom">News</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item active">Recent News</li>
    </div>
</ul>

<section class="updates">
    <div class="container-fluid">
        <div class="row">
            

            @if($news)
            @foreach($news as $n)
            <div class="recent-updates card">
                <div class="card-body">
                    <div class="row">
                        <div class="col col-6">
                            <h3>{{$n->news}}</h3>
                            <p>Related Link : {{$n->link}}</p>
                        </div>
                        <div class="col col-2 date text-right">
                            <strong>{{date("d",strtotime($n->created_at))}}</strong><span>{{date("M",strtotime($n->created_at))}}</span>
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