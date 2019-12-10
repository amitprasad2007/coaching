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
        Add Package </h1>
        <div class="content">
<form role="form" id='frm-add-class' method='post' action="{{Route('packages.store') }}">   
@csrf    

 

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Package Name  </label>
            
            <input type="text" value ="" class="form-control" id="class_name" name="name" required="required" placeholder="Enter Package Name">
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
            <label class="control-label"> No Of Papers  </label>
            <input type="text" value ="" class="form-control" id="class_name" name="no_of_papers" required="required" placeholder="Enter No Of Papers" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Validity (In Days)  </label>
            
            <input type="text" value ="" class="form-control" id="class_name" name="validity" required="required"  placeholder="Enter Validity" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Price </label>
           <input type="text" value ="" class="form-control" id="class_name" name="price" required="required" placeholder="Enter Price"  >
        </div>

        </div>
    <div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Package Overview  </label>
            <input type="textarea" value ="" class="form-control" id="class_name" name="overview" required="required"  placeholder="Enter Package Overview ">    
        </div>
    </div>
<div class="col-sm-6">
        <div class="form-group">
            <label class="control-label"> Benifits Of This Package   </label>
            <input type="textarea" value ="" class="form-control" id="class_name" name="benifit" required="required" placeholder="Enter Benifits Of This Package ">    
        </div>
    </div>

    </div>
    </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Add Package</button>
            </div>
             <div class="clearfix"></div>
              </form>
         </div>
    </section>
   </div>
  </div>
  </div>
    

@endsection