@extends("admin.layouts.layout")
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
        <div class="row">
            <div class="dashbar">
                <div class="col-md-12 text-right">
                   <a title="Student Wise Results" href="{{ route('subjectmodulesresults-user_list') }}" class="btn btn-action">Student Wise Results</a>
                   <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card"> 
                    <div class="header"><h1>Modules</h1></div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Total Marks</th>
                                        <th>Pass Marks</th>
                                        <th>Negative Marks / Question</th>
                                        <th>Exam Time</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                        
                                    </tr>
                                    
                                </thead>
                               
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($subjectmodules)
                                    @foreach($subjectmodules as $subjectmodule)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$subjectmodule->name}}</td>
                                        <td>{{$subjectmodule->subject_name}}</td>
                                        <td>{{$subjectmodule->total_marks }}</td>
                                        <td>{{$subjectmodule->pass_marks }}</td>
                                        <td>{{$subjectmodule->negative_marks_on}}</td>
                                        <td>{{$subjectmodule->exam_time}} Mins</td>
                                        <td> <a class="btn btn-primary btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$subjectmodule->id.'/view_all_results') !!}" class="btn btn-simple btn-warning btn-icon edit">View All Results</a>
                                            <a class="btn btn-success btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$subjectmodule->id.'/view_passed_attempts') !!}" class="btn btn-simple btn-warning btn-icon edit">View Passed Attempts</a>
                                        <a class="btn btn-danger btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$subjectmodule->id.'/view_failed_attempts') !!}" class="btn btn-simple btn-warning btn-icon edit">View Failed Attempts</a>
                                        <a class="btn btn-info btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$subjectmodule->id.'/view_ranks') !!}" class="btn btn-simple btn-warning btn-icon edit">View Ranks</a>
                                        <a class="btn btn-info btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$subjectmodule->id.'/module_wise_analysis') !!}" class="btn btn-simple btn-primary btn-icon edit">View Report</a>
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

@endsection