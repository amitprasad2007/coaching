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
        Add Topic
     
      </h1>
                    <div class="content">
                        {!! Form::open([ 'route' => [ 'topics.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => 'planner-form' ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                
                                <div class="form-group">
                                    <label class="control-label"> Choose Subject</label>
                                      <select name="subject_id" class="form-control" style="padding: 0px;"> @if($subjects)                                    
                                         @foreach($subjects as $subject)
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
                                        <label class="control-label"> Topic Name  </label>
                                        {!! Form::text('topic',null, array('required' => 'required', 'rows' => '4','placeholder' => 'Topic Name', 'class' => 'form-control'))  !!}
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Add Topic</button>
                            </div>
                            <div class="clearfix"></div>
       {!! Form::close() !!}   
</section>
   </div>
  </div>
    

@endsection