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
                   <a title="Add SubjectModules" href="{{route('subjectmodules.create')}}" class="btn btn-action"><i class="fa fa-plus"></i> Add Subject Modules</a>
                    
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
                <h1>Test</h1>    
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
                                        <th>Negative Marks</th>
                                        <th>Exam Time</th>
                                         <th>Action</th>
                                         <th>Status</th>
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
        ajax: "{{ route('subjectmodules-data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'subject_name', name: 'subject_name'},
            {data: 'total_marks', name: 'total_marks'},
            {data: 'pass_marks', name: 'pass_marks'},
            {data: 'negative_marks_on', name: 'negative_marks_on'},
            {data: 'exam_time', name: 'exam_time'},
            {data: 'action_btns',name: 'action_btns'},
            {data: 'status',name: 'status'},
            ]
            });
            });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function () {
        $(document).on("click", ".btn-subjectmodules-delete", function () {
            var conf = confirm("Are you sure want to delete ?");
            if (conf) {
                // ajax call functions
                var delete_id = $(this).attr("data-id"); // delete id of delete button
                var postdata = {
                    "_token": "{{ csrf_token() }}",
                    "delete_id": delete_id
                }
                $.post("{{ route('deletesubjectmodules') }}", postdata, function (response) {
                    var data = $.parseJSON(response);
                    if (data.status == 1) {
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                })
            }
        });
    });
</script>

@endsection