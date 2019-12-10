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
        Add Questions
     
      </h1>
                    <div class="content">
                        {!! Form::open([ 'route' => [ 'questions.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => 'planner-form' ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                
                                <div class="form-group">
                                    <label class="control-label"> Choose Topic</label>
                                      <select name="topic_id" class="form-control" style="padding: 0px;"> @if($datas['topics'])                                    
                                         @foreach($datas['topics'] as $subject)
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
                                        <label class="control-label"> Question </label>
                                        {!! Form::textarea('question',null, array('required' => 'required', 'rows' => '4','placeholder' => 'Benifits Of This Package', 'class' => 'form-control'))  !!}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4"> 
                                                <label class="radio">
                                                    <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span>
                                                    <input type="radio" name="right_option" value="a" class="radio_class"> Option A
                                                </label>
                                            </div>
                                            <div class="col-sm-8">        
                                                {!! Form::text('option_a',null, array('required' => 'required', 'placeholder' => 'Option A', 'class' => 'form-control'))  !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4"> 
                                                <label class="radio">
                                                    <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span>
                                                    <input type="radio" name="right_option" value="b" class="radio_class">  Option B
                                                </label>
                                            </div>
                                            <div class="col-sm-8">        
                                                {!! Form::text('option_b',null, array('required' => 'required', 'placeholder' => 'Option B', 'class' => 'form-control'))  !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4"> 
                                                <label class="radio">
                                                    <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span>
                                                    <input type="radio" name="right_option" value="c" class="radio_class"> Option C
                                                </label>
                                            </div>
                                            <div class="col-sm-8">        
                                                {!! Form::text('option_c',null, array('required' => 'required', 'placeholder' => 'Option C', 'class' => 'form-control'))  !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4"> 
                                                <label class="radio">
                                                    <span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span>
                                                    <input type="radio" name="right_option" value="d" class="radio_class"> Option D
                                                </label>
                                            </div>
                                            <div class="col-sm-8">        
                                                {!! Form::text('option_d',null, array('required' => 'required', 'placeholder' => 'Option D', 'class' => 'form-control'))  !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                     <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Add Question</button>
                                    </div>
                                </div>
                            </div>
                       
                        <div class="clearfix"></div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div> 


@endsection