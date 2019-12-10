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
     <ol class="breadcrumb">    </ol>

                    <div class="col-md-12 text-right">
                   <a title="Add User" href="{{route('user.create')}}" class="btn btn-action"><i class="fa fa-plus"></i> Add User</a>
                    <a title="Import Data" href="{{route('import')}}" class="btn btn-action"><i class="fa fa-download"></i> Import Data</a>
                    <a title="Export Data" href="{{route('users.export_data')}}" class="btn btn-action"><i class="fa fa-upload"></i> Export Data</a>
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>

        <h1>
            List Students
        </h1>    

    </section>
    <div class="box box-primary">
        <div class="box-header with-border"></div>
        <table class="table table-bordered data-table">
            <thead>
            <tr>
            <th width="3%">SL No</th>
             <th>Name</th>
             <th>Email</th>
             <th>Date of Birth</th>
             <th>Phone Number</th>
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

        ajax: "{{ route('liststudents-data') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'name', name: 'name'},

            {data: 'email', name: 'email'},
            {data: 'dob', name: 'dob'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'action_btns', name: 'action_btns'},
            {data:'status',name:'status'},

        ]

    });

    

  });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function () {
        $(document).on("click", ".btn-student-delete", function () {
            var conf = confirm("Are you sure want to delete ?");
            if (conf) {
                // ajax call functions
                var delete_id = $(this).attr("data-id"); // delete id of delete button
                var postdata = {
                    "_token": "{{ csrf_token() }}",
                    "delete_id": delete_id
                }
                $.post("{{ route('deletestudent') }}", postdata, function (response) {
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