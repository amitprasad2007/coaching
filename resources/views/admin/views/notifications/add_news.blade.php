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
        Add News </h1>
        <div class="content">
<form role="form" id='frm-add-class' method='post' action="{{Route('news.store') }}">   
@csrf    
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> News  </label>
            
            <input type="text" value ="" class="form-control" id="class_name" name="news" required="required" placeholder="Enter News">
        </div>
    </div>
      </div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Link  </label>
            <input type="textarea" value ="" class="form-control" id="class_name" name="link" required="required" placeholder="Enter Link" >
        </div>
     </div>
     </div>
        <div class="text-right col-sm-6">
            <button type="submit" class="btn btn-primary">Add News</button>
            </div>
             <div class="clearfix"></div>
              </form>
         </div>
    </section>
   </div>
  </div>
  </div>
    

@endsection