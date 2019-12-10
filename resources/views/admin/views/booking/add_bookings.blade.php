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
        Add Booking </h1>
        <div class="content">
<form role="form" id='frm-add-class' method='post' action="{{Route('bookings.update') }}">   
@csrf    
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Coupon Code  </label>
            <input type="text" value ="" class="form-control" id="class_name" name="code" required="required" placeholder="Enter Coupon Code">
        </div>
    </div>
      </div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Validity Start Date  </label>
            <input type="date" value ="" class="form-control" id="class_name" name="validity_start_date" required="required" placeholder = 'Validity Start Date' >
        </div>
     </div>
     </div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Validity End Date  </label>
            <input type="date" value ="" class="form-control" id="class_name" name="validity_end_date" required="required" placeholder = 'Validity End Date' >
        </div>
     </div>
     </div>
      <div class="form-group">  
    <label class="control-label"> Discount Type </label>      
        <label class="radio">
           
            {{ Form::radio('discount_type', '1',  array('data-toggle' => 'radio')) }}Flat
        </label>
        <label class="radio">
            
            {{ Form::radio('discount_type', '2',  array('data-toggle' => 'radio')) }}Percentage
        </label>
    </div>
    <div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Discount   </label>
            <input type="number" value ="" class="form-control" id="class_name" name="discount" required="required" placeholder = 'Discount' >
        </div>
     </div>
     </div>
     <div class="row">
<div class="form-group col-sm-6">    
    <label class="control-label"> Message </label>    
        {!! Form::textarea('message',null, array('required' => 'required', 'placeholder' => 'Message', 'class' => 'form-control'))  !!}
    </div>
     </div>
     <div class="row">
        <div class="text-right col-sm-6">
            <button type="submit" class="btn btn-primary">Add Coupon</button>
            </div>
             <div class="clearfix"></div>
             </div>
              </form>
         </div>
    </section>
   </div>
  </div>
  </div>
    

@endsection