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
<form role="form" id='frm-add-class' method='post' action="{{Route('editsavesubjectmodules') }}">   
@csrf    

  <input type="hidden" value ="{{$subjectmodules->id }}" class="form-control" id="class_name" name="id" required="required" >

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Module Name </label>
            
            <input type="text" value ="{{$subjectmodules->name }}" class="form-control" id="class_name" name="name" required="required" >
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
            <input type="text" value ="{{$subjectmodules->total_marks }}" class="form-control" id="class_name" name="total_marks" required="required" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Pass Marks </label>
            
            <input type="text" value ="{{$subjectmodules->pass_marks }}" class="form-control" id="class_name" name="pass_marks" required="required" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Negative Marks On No Of Wrong Answer </label>
           <input type="text" value ="{{$subjectmodules->negative_marks_on }}" class="form-control" id="class_name" name="negative_marks_on" required="required" >
        </div>

        </div>
    
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Exam Time (In Mins) </label>
            <input type="text" value ="{{$subjectmodules->exam_time }}" class="form-control" id="class_name" name="exam_time" required="required" >    
        </div>
    </div>
    </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update Test</button>
                            </div>
                            <div class="clearfix"></div>
                    </form>
                    </div></section>
   </div>
  </div>
  </div>
    

@endsection