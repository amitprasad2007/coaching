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
            Edit Faculty
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Faculty</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-md-6">
                <!-- general form elements -->
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
                    <form role="form" id='frm-add-faculty' method='post' action="{{ route('saveeditFaculty') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
            <input type="hidden"  value="{{$data->id}}" name='id'>
                        <div class="form-group">
                            <label for="dd_type">Choose Type</label>
                            <select class='form-control' id='dd_type' name='dd_type'>
                            <option value='-1'>Select Faculty Type</option>
                                @if(count($types) > 0)

                                @foreach($types as $index => $type)

                                <option value="{{ $type->id }}">{{ ucfirst($type->type) }}</option>

                                @endforeach

                                @endif
                            </select>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="faculty_name">Name</label>
                        <input type="text" class="form-control" id="faculty_name" value="{{$data->name}}" name='faculty_name'>
                            </div>
                            <div class="form-group">
                                <label for="faculty_email">Email</label>
                                <input type="email" class="form-control" id="faculty_email" name='faculty_email' value="{{$data->email}}">
                            </div>
                            <div class="form-group">
                                <label for="faculty_designation">Designation</label>
                                <input type="text" class="form-control" id="faculty_designation" name='faculty_designation' value="{{$data->designation}}">
                            </div>

                            <div class="form-group">
                                <label for="faculty_phone">Phone no</label>
                                <input type="number" class="form-control" id="faculty_phone" name='faculty_phone' value="{{$data->phone_no}}">
                            </div>

                            <div class="form-group">
                                <label for="dd_gender">Gender</label>
                                <select class='form-control' id='dd_gender' name='dd_gender'>
                                                                        @if(count($genders) > 0)

                                    @foreach($genders as $index => $gender)
                                    <option value="{{ $gender->id }}">{{ ucfirst($gender->type) }}</option>
                                    @endforeach

                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="faculty_photo">Profile Photo</label>
                                <input type="file" class="form-control" id="faculty_photo" name='faculty_photo'>
                            </div>

                            <div class="form-group">
                                <label for="faculty_photo">Address</label>
                                <textarea class="form-control" name="faculty_address" id="faculty_address" value="{{$data->address}}"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="dd_status">Status</label>
                                <select class='form-control' id='dd_status' name='dd_status'>
                                    <option value='1'>Active</option>
                                    <option value='0'>Inactive</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>

@endsection 