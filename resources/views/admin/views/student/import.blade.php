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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        Add Profile
                    </div>
                    <div class="content">
                        {!! Form::open(array('route'=>'users.import_store','class'=>'','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Upload File </label>
                                        <input type="file" name="image" required="required" class="form-control">
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Upload Data</button>
                                    </div>
                                    <div class="form-group">
                                        <p class="help-block">Please download students sample file from below link<br/><a href="{!! asset('sample_files/user_sample.csv')!!}" class="btn btn-primary" target="_blank">Download File</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
</div>
@endsection