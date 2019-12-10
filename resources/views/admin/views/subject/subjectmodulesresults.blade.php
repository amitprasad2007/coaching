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
     <section class="content-header">
                <div class="text-right">
                   <a title="Add User" href="{{route('user.create')}}" class="btn btn-action"><i class="fa fa-plus"></i> Add User</a>
                    <a title="Import Data" href="#" class="btn btn-action"><i class="fa fa-download"></i> Import Data</a>
                    <a title="Export Data" href="#" class="btn btn-action"><i class="fa fa-upload"></i> Export Data</a>
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
                <h1>Modules</h1>    
</section>
                 <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                        <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                    <th width="3%">SL No</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Total Marks</th>
                                        <th>Pass Marks</th>
                                        <th>Negative Marks / Question</th>
                                        <th>Exam Time</th>
                                        
                                    </tr>
                                </thead>
                                 <tbody>
                                     
                                 </tbody>
                        </table>
                    </div>
 </div>
<script type="text/javascript">
$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('subjectmodulesresults-data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'subject_name', name: 'subject_name'},
            {data: 'total_marks', name: 'total_marks'},
            {data: 'pass_marks', name: 'pass_marks'},
            {data: 'negative_marks_on', name: 'negative_marks_on'},
            {data: 'exam_time', name: 'exam_time'},
           
            ]
            });
            });
</script>

@endsection