@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute |$user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")

@section("content")

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Subject Modules </h1>
        <div class="content">
 {!! Form::open([ 'route' => [ 'subjectmodules.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => 'planner-form' ]) !!}
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Module Name </label>
            {!! Form::text('name',null, array('required' => 'required', 'placeholder' => 'Module Name', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Choose Subject</label>
            <select name="subject_id" class="form-control" style="padding: 0px;">
                @if($datas['subjects'])                                    
                @foreach($datas['subjects'] as $subject)
                <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Total Marks </label>
            {!! Form::text('total_marks',null, array('required' => 'required', 'placeholder' => 'Total Marks', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Pass Marks </label>
            {!! Form::text('pass_marks',null, array('required' => 'required', 'placeholder' => 'Pass Marks', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Negative Marks On No Of Wrong Answer </label>
            {!! Form::text('negative_marks_on',null, array('required' => 'required', 'placeholder' => 'Negative Marks On No Of Wrong Answer', 'class' => 'form-control'))  !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Exam Time (In Mins) </label>
            {!! Form::text('exam_time',null, array('required' => 'required', 'placeholder' => 'Exam Time (In Mins)', 'class' => 'form-control'))  !!}
        </div>
    </div>
</div>
<div class="text-center col-sm-12">
  <button type="submit" class="btn btn-primary">Add Subject</button>
</div>
 {!! Form::close() !!}   
</section>
   </div>
  </div>
  </div>
    

@endsection