@extends("admin.layouts.layout_student")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Profile</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </div>
</ul>

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <!-- Basic Form-->
            <div class="col-sm-8">
                <div class="card">
                    
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Basic User Details</h3>
                    </div>
                    <div class="card-body">

                        {!! Form::open(array('route'=>'student.auth.profile','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'profile-form')) !!}
                        <div class="row">    
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ Auth::guard()->user()->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email Id</label>
                                    <input type="text" name="email" placeholder="Email Id" class="form-control" value="{{ Auth::guard()->user()->email }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone No</label>
                                    <input type="text" name="phone_number" placeholder="Phone No" class="form-control" value="{{ Auth::guard()->user()->phone_number }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Alternate Phone No</label>
                                    <input type="text" name="alternate_phone_number" placeholder="Alternate Phone No" class="form-control" value="{{ Auth::guard()->user()->alternate_phone_number }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Address</label>
                                    <input type="text" name="address" placeholder="Address" class="form-control" value="{{ Auth::guard()->user()->address }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">City</label>
                                    <input type="text" name="city" placeholder="City" class="form-control" value="{{ Auth::guard()->user()->city }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">State</label>
                                    <input type="text" name="state" placeholder="State" class="form-control" value="{{ Auth::guard()->user()->state }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary exambtn">Update Profile</button>
                                    <!--<input type="submit" value="Update Profile" class="btn btn-primary">-->
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!-- Qualification Detail Form-->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Change Password</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route'=>'student.auth.profile','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'profile-form')) !!}    
                        <div class="form-group">
                            <label class="form-control-label">New Password</label>
                            <input type="password" name="password" placeholder="New Password" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Confirm Password</label>
                            <input type="password" name="cnf_password" placeholder="Confirm Password" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary exambtn">Update Password</button>
                            <!--<input type="submit" value="Update Profile" class="btn btn-primary">-->
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</div>
@endsection	