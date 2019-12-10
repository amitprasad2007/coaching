@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute |$user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")

@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Class
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>
       <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
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
            
{!! Form::open(array('route'=>'users.store','class'=>'','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                      
            <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Name</label>
            {!! Form::text('name', null, array('required' => 'required', 'placeholder' => 'Name', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Date of Birth</label>
            {!! Form::date('dob', null, array('required' => 'required', 'placeholder' => 'Date of Birth', 'class' => 'form-control datepicker'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Phone Number</label>
            {!! Form::text('phone_number', null, array('required' => 'required', 'placeholder' => 'Phone Number', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Alternate Phone Number</label>
            {!! Form::text('alternate_phone_number', null, array( 'placeholder' => 'Alternate Phone Number', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Email</label>
            {!! Form::email('email', null, array('required' => 'required', 'placeholder' => 'Email', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Password</label>
            {!! Form::password('password', null, array('required' => 'required', 'placeholder' => 'Password', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Address</label>
            {!! Form::textarea('address', null, array('required' => 'required', 'rows' => '3', 'placeholder' => 'Address', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Percentage in 10th Exam</label>
            {!! Form::text('tenth_percentage', null, array( 'placeholder' => 'Percentage in 10th Exam', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Board Name</label>
            {!! Form::text('tenth_board_name', null, array( 'placeholder' => 'Board Name', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Percentage in 12th Exam</label>
            {!! Form::text('twlth_percentage', null, array( 'placeholder' => 'Percentage in 12th Exam', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Board Name</label>
            {!! Form::text('twlth_board_name', null, array( 'placeholder' => 'Board Name', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Percentage in UG Exam</label>
            {!! Form::text('ug_percentage', null, array( 'placeholder' => 'Percentage in UG Exam', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>University Name</label>
            {!! Form::text('ug_university_name', null, array( 'placeholder' => 'University Name', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Percentage in PG Exam</label>
            {!! Form::text('pg_percentage', null, array( 'placeholder' => 'Percentage in PG Exam', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>University Name</label>
            {!! Form::text('pg_university_name', null, array( 'placeholder' => 'University Name', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>City</label>
            {!! Form::text('city', null, array('required' => 'required', 'placeholder' => 'City', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>State</label>
            {!! Form::text('state', null, array('required' => 'required', 'placeholder' => 'State', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Country</label>
            {!! Form::text('country', 'India', array('required' => 'required', 'placeholder' => 'Country', 'class' => 'form-control', 'readonly' => 'readonly'))  !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" onchange="get_thumb(this)" class="form-control" style="padding: 0px;">
        </div>
    </div>
</div>
<div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Profile</button>
                            </div>
                            <div class="clearfix"></div>
       {!! Form::close() !!}   
</section>
   </div>
  </div>
    

@endsection