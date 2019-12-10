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
        Add Notifications </h1>
        <div class="content">
<form role="form" id='frm-add-class' method='post' action="{{Route('notifications.store') }}">   
@csrf    
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Title  </label>
            
            <input type="text" value ="" class="form-control" id="class_name" name="title" required="required" placeholder="Enter Title">
        </div>
    </div>
      </div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Message  </label>
            <input type="textarea" value ="" class="form-control" id="class_name" name="message" required="required" placeholder="Enter Message" >
        </div>
     </div>
     </div>
        <div class="text-right col-sm-6">
            <button type="submit" class="btn btn-primary">Add Notifications</button>
            </div>
             <div class="clearfix"></div>
              </form>
         </div>
    </section>
   </div>
  </div>
  </div>
    

@endsection