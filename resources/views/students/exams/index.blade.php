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
<div class="container-fluid">
        <h2 class="no-margin-bottom">Recent Exams</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item active">Exams</li>
    </div>
</ul>

<section class="updates">
    <div class="container-fluid">
        <div class="row">
            
            @if($exams)
            @foreach($exams as $exam)

            <div class="col-lg-4">
                <div class="recent-updates card">
                    <div class="card-header">
                        {{$exam->name}}&nbsp;<small style="color:#000">({{$exam->subject_name}})</small>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Total Mark :</td>
                                <td align="right">{{$exam->total_marks}}</td>
                            </tr>
                            <tr>
                                <td>Total Time :</td>
                                <td align="right">{{$exam->exam_time}} mins</td>
                            </tr>
                            <tr>
                                <td>Pass Mark :</td>
                                <td align="right">{{$exam->pass_marks}}</td>
                            </tr>
                        </table>
                        <a class="btn exambtn" href="{!! URL::to('student/exams/'.$exam->id.'/instruction') !!}" target="_new">Start Exam</a>
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