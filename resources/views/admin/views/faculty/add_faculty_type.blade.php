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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Faculty Type
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Faculty Type</li>
      </ol>
    </section>
        <!-- general form elements -->
        <div class="col-md-6">
          <div class="box box-primary">
          @if(session()->has("message"))
                    <div class="alert alert-success">
                    <p>{{ session('message') }}</p>
                    </div>
           @endif

                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id='frm-add-faculty-type' method='post' action="{{ route('savefacultytype') }}">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="faculty_type">Faculty Type</label>
                  <input type="text" class="form-control" id="faculty_type" name="faculty_type" placeholder="Enter Faculty Type">
                </div>
                <div class="form-group">
                  <label for="dd_status">Status</label>
                <select class="form-control" id='dd_status'name='dd_status'>
                <option Value='1' >Active</option>
                <option Value='0'>InActive</option>
                 </select>  
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
          <!-- /.box -->
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
@endsection