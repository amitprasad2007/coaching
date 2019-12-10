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
              <a href="{{route('notifications.index')}}"><span><i class="pe-7s-box2"></i></span>Manage Notifications</a>
            <a href="{{route('news.index')}}"><span><i class="pe-7s-graph2"></i></span> Manage News</a>
            
    </section>
    <section class="content-header">
     <ol class="breadcrumb">    </ol>

                    <div class="col-md-12 text-right">
                   <a title="Add User" href="{{route('notifications.create')}}" class="btn btn-action"><i class="fa fa-plus"></i> Add Notification</a>
                   
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>

        <h1>
           Notifications
        </h1>    

    </section>
    <div class="box box-primary">
        <div class="box-header with-border"></div>
        <table class="table table-bordered data-table">
            <thead>
                                    <tr>
                                    <th width="3%">SL No</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Create At</th>
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
        ajax: "{{ route('notifications-data') }}",
         columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'message', name: 'message'},
                    {data: 'created_at', name: 'created_at'},
                  

                    ]});
                 });
</script>

@endsection