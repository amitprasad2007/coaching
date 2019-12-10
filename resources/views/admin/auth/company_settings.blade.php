@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute |$user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")

@section("content")

<div class="content-wrapper">
	 <div class="container-fluid">
        <div class="row">         
            <div class="col-md-12">
                <div class="card">
                    <div class="header">Basic Settings</div>
                    <div class="content">
                        <div class="row">
                        {!! Form::open([ 'route' => [ 'admin.auth.basic_settings_submit' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'planner-form' ]) !!}
                        <div class="col-sm-12">
                            <div class="form-group">
                                
                                <div class="col-sm-6">    
                                <label  class="control-label"> Website Url </label>    
                                    {!! Form::text('website',null, array( 'placeholder' => 'Website Url', 'class' => 'form-control'))  !!}
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-sm-6">    
                                <label  class="control-label"> Support Email </label>    
                                    {!! Form::text('support_email',null, array( 'placeholder' => 'Support Email', 'class' => 'form-control'))  !!}
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-sm-6">    
                                <label  class="control-label"> Support Phone No </label>    
                                    {!! Form::text('support_phone',null, array( 'placeholder' => 'Support Phone No', 'class' => 'form-control'))  !!}
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-sm-6">    
                                <label  class="control-label"> Facebook Link </label>    
                                    {!! Form::text('fb_link',null, array( 'placeholder' => 'Facebook Link', 'class' => 'form-control'))  !!}
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-sm-6">    
                                <label  class="control-label"> Twitter Link </label>    
                                    {!! Form::text('twitter_link',null, array( 'placeholder' => 'Twitter Link', 'class' => 'form-control'))  !!}
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-sm-6">    
                                <label  class="control-label"> Youtube Link </label>    
                                    {!! Form::text('youtube_link',null, array( 'placeholder' => 'Youtube Link', 'class' => 'form-control'))  !!}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

	</div>
	@endsection