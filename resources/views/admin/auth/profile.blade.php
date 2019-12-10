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
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        Edit Profile
                    </div>
                    <div class="content">
                        {!! Form::open(array('route'=>'profile.update','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'profile-form')) !!}    
                          
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ Auth::guard()->user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" name="phone_number" class="form-control" placeholder="Mobile" value="{{ Auth::guard()->user()->phone_number }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ Auth::guard()->user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea rows="3" name="address" class="form-control" placeholder="Enter your address..." value="Mike">{{ Auth::guard()->user()->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" placeholder="City" value="{{ Auth::guard()->user()->city }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" placeholder="State" value="{{ Auth::guard()->user()->state }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" placeholder="Country" value="India" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" onchange="get_thumb(this)" class="form-control" style="padding: 0px;">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    
                    <div class="content">
                        <div class="author">
                            <a href="javascript:void(0)">
                                @if(Auth::guard()->user()->image)
                                <img id="blah1" class="avatar border-gray" alt="..." src="{!! asset('users_image/'.Auth::guard()->user()->image) !!}" />
                                @else
                                <img id="blah1" class="avatar border-gray" alt="..." src="{!! asset('users_image/no-user-image.gif') !!}" />
                                @endif
                                <h4 class="title">{{ Auth::guard()->user()->name }}<br />
                                    <small>{{ Auth::guard()->user()->email }}</small><br />
                                    <small>{{ Auth::guard()->user()->mobile }}</small>
                                </h4>
                            </a>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('#blah1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function get_thumb(input) {
        readURL(input);
    }
    
</script>
@endsection