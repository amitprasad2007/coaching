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
              <a href="{{route('packages.index')}}"><span><i class="pe-7s-box2"></i></span> All Packages</a>
            <a href="{{route('bookings.index')}}"><span><i class="pe-7s-graph2"></i></span> All Bookings</a>
            <a href="{{route('coupons.index')}}"><span><i class="pe-7s-box"></i></span> All Coupon Codes</a>
    </section>
    <section class="content-header">
     <ol class="breadcrumb">    </ol>

                    <div class="col-md-12 text-right">
                   <a title="Add Package" href="{{route('packages.create')}}" class="btn btn-action"><i class="fa fa-plus"></i> Add Pacakages</a>
                    
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>

        <h1>
           Packages
        </h1>    

    </section>
    <div class="box box-primary">
        <div class="box-header with-border"></div>
        <table class="table table-bordered data-table">
            <thead>
                 <tr>
                 <th width="3%">SL No</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th width="120px">No Of Papers</th>
                    <th width="120px">Validity</th>
                    <th width="120px">Price</th>
                    <th>Overview</th>
                    <th>Benifits</th>
                   
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
        ajax: "{{ route('packages-data') }}",
         columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'subject_name', name: 'subject_name'},
                    {data: 'no_of_papers', name: 'no_of_papers'},
                    {data: 'validity', name: 'validity'},
                    {data: 'price', name: 'price'},
                    {data: 'overview', name: 'overview'},
                    {data: 'benifit', name: 'benifit'},

                    ]});
                 });
</script>

@endsection