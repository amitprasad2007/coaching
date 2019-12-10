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
                    <a title="Module Wise Results" href="{{route('subjectmodulesresults.index')}}" class="btn btn-action">Module Wise Results</a>
                    <a title="Export Data" href="{{route('users.export_data')}}" class="btn btn-action"><i class="fa fa-upload"></i> Export Data</a>
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card"> 
                    <div class="header"><h1>Users</h1></div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php $slno = 1; @endphp
                                    @if($users)
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone_number}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-primary btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$user->id.'/view_user_all_results') !!}" class="btn btn-simple btn-warning btn-icon edit">View All Results</a>
                                            <a class="btn btn-success btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$user->id.'/view_user_passed_attempts') !!}" class="btn btn-simple btn-warning btn-icon edit">View Passed Attempts</a>
                                        <a class="btn btn-danger btn-fill btn-xs" title="Add Question" href="{!! URL::to('/subjectmodulesresults/'.$user->id.'/view_user_failed_attempts') !!}" class="btn btn-simple btn-warning btn-icon edit">View Failed Attempts</a>
                                        <a class="btn btn-info btn-fill btn-xs" title="Add Question" href="
                                    {!! URL::to('/subjectmodulesresults/'.$user->id.'/user_wise_analysis') !!}" class="btn btn-simple btn-primary btn-icon edit">View Report</a>
                                        </td>
                                    </tr>
                                    @php $slno = $slno + 1; @endphp    
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