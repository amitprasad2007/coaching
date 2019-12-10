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
						<h2 class="h3">Exam Summary</h2>
					</div>
					<div class="card-body">
						<h4>Name :&nbsp; {{$module->name}}&nbsp;&nbsp;&nbsp; (<span style="color:#ef5285">{{$module->subject_name}}</span>)</h4>

						<div class="row">
							<div class="col-sm-6">
								<table class="table">
                                    <tr>
                                        <td><strong>Total Mark :</strong></td>
                                        <td align="right">{{$module->total_marks}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Time :</strong></td>
                                        <td align="right">{{$module->exam_time}} mins</td>
                                    </tr>
                                </table>
							</div>
							<div class="col-sm-6">
								<table class="table">
                                    <tr>
                                        <td><strong>Total Question :</strong></td>
                                        <td align="right">{{$module->total_marks}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pass Mark :</strong></td>
                                        <td align="right">{{$module->pass_marks}}</td>
                                    </tr>
                                </table>
							</div>
						</div>

						
					  <h4>Please read the instructions carefully</h4>
					  <ol>
						  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
						  <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>
						  <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </li>
						  <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
						  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
						  <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>
						  <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </li>
						  <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
					  </ol>
					  <a href="{!! URL::to('student/exams/'.$id.'/instruction') !!}" class="btn exambtn" style="float:left;">Previous</a>
					  <a href="{!! URL::to('student/exams/'.$id.'/give') !!}" class="btn exambtn" style="float:right;">Start Exam</a></p>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>

</div>
@endsection 