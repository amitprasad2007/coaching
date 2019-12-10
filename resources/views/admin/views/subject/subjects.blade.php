@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")
@section("content")
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">    </ol>
            <a href="{{route('questions.index')}}"><span><i class="btn btn-action"></i></span> Topic Wise Question</a>
            <a href="{{route('topics.index')}}"><span><i class="btn btn-action"></i></span> All Topics</a>
            <a href="{{route('subjects.index')}}"><span><i class="btn btn-action"></i></span> All Subjects</a>
    </section>
    <section class="content-header">
     <ol class="breadcrumb">    </ol>

                    <div class="col-md-12 text-right">
                   <a title="Add subject" href="{{route('subjects.create')}}" class="btn btn-action"><i class="fa fa-plus"></i> Add Subject</a>
                    
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>

        <h1>
           Topic Wise Questions
        </h1>    

    </section>
    <div class="box box-primary">
        <div class="box-header with-border"></div>
        <table class="table table-bordered data-table">
            <thead>
             <tr>
             <th width="3%">SL No</th>
                <th>Name</th>
                <th>Code</th>
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
        ajax: "{{ route('subjects-data') }}",
         columns: [
                   	{data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'code', name: 'code'},
                    {data: 'action_btns', name: 'action_btns'},
           			{data:'status',name:'status'},
           		 ]
				 });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function () {
        $(document).on("click", ".btn-subjects-delete", function () {
            var conf = confirm("Are you sure want to delete ?");
            if (conf) {
                // ajax call functions
                var delete_id = $(this).attr("data-id"); // delete id of delete button
                var postdata = {
                    "_token": "{{ csrf_token() }}",
                    "delete_id": delete_id }
                $.post("{{ route('deletesubjects') }}", postdata, function (response) {
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