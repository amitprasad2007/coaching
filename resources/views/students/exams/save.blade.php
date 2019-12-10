@extends("admin.layouts.layout_student")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="exam">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
				<div class="articles card">
					<div class="card-close"></div>
					<div class="card-header d-flex align-items-center">
						<h2 class="h3">Exam Completed</h2>
					</div>
					<div class="card-body">
					  <p style="text-align: center;">Your exams answer saved successfully.</p>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>
<script>
	setTimeout(function(){
		window.close();
	},3000);
</script>
</div>
@endsection 