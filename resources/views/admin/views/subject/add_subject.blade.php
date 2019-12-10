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
        Add Subject </h1>
        <div class="content">
 {!! Form::open([ 'route' => [ 'subjects.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => 'planner-form' ]) !!}
 <div class="row">
  <div class="col-sm-6">
  <div class="form-group">
  <label class="control-label"> Choose Category</label>
  <select name="category_id" class="form-control" style="padding: 0px;"> @if($categories)
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
     @endif 
     </select>
      </div>
      </div>
      </div>

 <div class="col-sm-6">
  <div class="form-group">
      <label class="control-label"> Subject Name </label>
      {!! Form::text('name',null, array('required' => 'required', 'placeholder' => 'Subject Name', 'class' => 'form-control'))  !!}

  </div>
  <div class="form-group">
      <label class="control-label"> Subject Code </label>
      {!! Form::text('code',null, array('required' => 'required', 'placeholder' => 'Subject Code', 'class' => 'form-control'))  !!}
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