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
    <header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Attempt Exams @if($exams)({{@count($exams)}}) @endif</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item active">Attempt Exams</li>
    </div>
</ul>

<section class="updates">
    <div class="container-fluid">
        <div class="row">



            @if($exams)
            @foreach($exams as $exam)

            <div class="col-lg-6">
                <div class="recent-updates card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-12 col-sm-8">
                                {{$exam->exam_name}}&nbsp;<small style="color:#000">({{$exam->subject_name}})</small>
                            </div>
                            <div class="col col-12 col-sm-4 text-right">
                                <strong>{{date("d",strtotime($exam->created_at))}}</strong> {{date("M",strtotime($exam->created_at))}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
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
                            </div>
                            <div class="col col-6">
                                <table class="table">
                                    <tr>
                                        <td>Mark Obtain :</td>
                                        <td align="right">{{$exam->total_marks_obtain}}</td>
                                    </tr>
                                    <tr>
                                        <td>Time Taken :</td>
                                        <td align="right">{{$exam->time_taken}} mins</td>
                                    </tr>
                                    <tr>
                                        <td>Right Ans :</td>
                                        <td align="right">{{$exam->total_right_ans}}</td>
                                    </tr>
                                    <tr>
                                        <td>Wrong Ans :</td>
                                        <td align="right">{{$exam->total_wrong_ans}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <a class="btn exambtn" href="{!! URL::to('student/attempt-exams/'.$exam->exam_id.'/details') !!}">Details</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif


        </div>
    </div>
</section>
@endsection 