@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute| $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('sutdent.dashboard')}}"><i class="fa fa-dashboard"></i><STRONG>For Student Dashboard </STRONG></a></li>
       
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$count_User}}</h3>

              <p>Total Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('liststudents')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$count_Subject}}</h3>

              <p>Total Subjects</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('subjects.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$count_Package}}</h3>

              <p>Total Packages</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('packages.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$count_Topic}}</h3>

              <p>Total Topics</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('topics.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
    <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="content-header">
                      <a href="{{Route('subjectmodules.index')}}"> <b> Active Tests</b></a>
                    </div>
                    <div class="content">
                        <div class="table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                       <th>SL No</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th align="center">Total Marks</th>
                                        <th align="center">Exam Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($subjectmodules)
                                    @foreach($subjectmodules as $subjectmodule)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$subjectmodule->name}}</td>
                                        <th>{{$subjectmodule->subject_name}}</td>
                                        <th align="center">{{$subjectmodule->total_marks }}</td>
                                        <th align="center">{{$subjectmodule->exam_time}} Mins</td>
                                        
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
                        <div class="col-md-6">
                <div class="card ">
                    <div class="content-header ">
                      <a href="{{Route('subjectmodulesresults.index')}}"><b> Last 10 Tests</b></a>
                    </div>
                    <div class="content">
                        <div class="table">
                           
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Module Name</th>
                                        <th>User Name</th>
                                        <th align="center">Total Marks</th>
                                        <th align="center">Pass Marks</th>
                                        <th align="center">Marks Obtained</th>
                                        
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($exams)
                                    @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$exam->subject_module_name}}</td>
                                        <td>{{$exam->user_name}}</td>
                                        <th align="center">{{$exam->total_marks }}</td>
                                        <th align="center">{{$exam->pass_marks}}</td>
                                        <th align="center">{{$exam->total_marks_obtain}}</td>
                                        
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection