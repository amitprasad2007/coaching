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
                    <a title="Add Coupon" href="{{ URL::to('add-faculty') }}" class="btn btn-action"><i class="fa fa-plus"></i> Add Faculty</a>
                    <a title="Import Data" href="{{route('import_faculty')}}" class="btn btn-action"><i class="fa fa-download"></i> Import Faculty List</a>
                    <a title="Export Data" href="{{route('faculty.export_data')}}" class="btn btn-action"><i class="fa fa-upload"></i> Export Faculty List</a>
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>

        <h1>
            Faculty list
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

        ajax: "{{ route('teacher.datatables') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone_no', name: 'phone_no'},
            {data:'status',name:'status'},
            {data: 'action_btns', name: 'action_btns', orderable: false, searchable: false},
          

        ]

    });

    

  });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function () {
        $(document).on("click", ".btn-teacher-delete", function () {
            var conf = confirm("Are you sure want to delete ?");
            if (conf) {
                // ajax call functions
                var delete_id = $(this).attr("data-id"); // delete id of delete button
                var postdata = {
                    "_token": "{{ csrf_token() }}",
                    "delete_id": delete_id
                }
                $.post("{{ route('facultydestroy') }}", postdata, function (response) {
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