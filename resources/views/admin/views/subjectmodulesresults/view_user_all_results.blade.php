@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
             <div class="dashbar">
                <div class="col-md-12 text-right">
                   
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
                                        <th>Module Name</th>
                                        <th>User Name</th>
                                        <th>Email Id</th>
                                        <th>Total Marks</th>
                                        <th>Pass Marks</th>
                                        <th>Marks Obtained</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                        
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
                                        <td>{{$exam->user_email }}</td>
                                        <td>{{$exam->total_marks }}</td>
                                        <td>{{$exam->pass_marks}}</td>
                                        <td>{{$exam->total_marks_obtain}}</td>
                                        <td> <a class="btn btn-primary btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$exam->exam_id.'/view_exam_details') !!}" class="btn btn-simple btn-warning btn-icon edit">View Details</a>
                                            
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