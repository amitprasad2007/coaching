@extends("admin.layouts.layout_student")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"><!-- selected class -->
<style>
	.qActive {
		color: #fff!important;
		border: 1px solid #ef5285!important;
		background: #ef5285!important;
	}
</style>
<!-- end -->
<!-- Page Header-->
<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Attempt Exam Details</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{!! URL::to('student/attempt-exams') !!}">Attempt Exams</a></li>
		<li class="breadcrumb-item active">Exam Details</li>
    </div>
</ul>

<section class="exam">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
			  <div class="articles card">
				<div class="card-header d-flex align-items-center">
				  <h2 class="h3">Select Question</h2>
				</div>
				<div class="card-body">
					<ul class="exammodel">
						@for($i=1;$i<=$exam->total_marks;$i++)
							@if($i==1)
								<li><a href="javascript:void(0)" class="nxtquestion qActive" qindex={{$i-1}}>{{$i}}</a></li>
							@else
								<li><a href="javascript:void(0)" class="nxtquestion" qindex={{$i-1}}>{{$i}}</a></li>
							@endif
						@endfor
					</ul>
				</div>
			  </div>
			</div>
			<div class="col-lg-8">
				<div class="articles card">
					<div class="card-close">
						<div class="dropdown">
							<p>Total : <span><b>{{$exam->total_marks}}</b> questions</span></p>
						</div>
					</div>
					<div class="card-header d-flex align-items-center">
						<h2 class="h3"><span id="qcount">1</span>. Question</h2>
					</div>
					@if(!@empty($questions))
					@for($i=0;$i<1;$i++)
						<div class="card-body" id="questionview">
						
						  <p class="portalQus">{{$questions[$i]->question}}</p>
						  <form>
							<div>
								<label class="qusRadio">
							  <input type="radio" value="a" disabled name="answer" qid={{$questions[$i]->id}} qindex={{$i}}><i></i>
							  {{$questions[$i]->option_a}}</label>
							</div>
							<div>
								<label class="qusRadio">
							  <input type="radio" value="b" disabled name="answer" qid={{$questions[$i]->id}} qindex={{$i}}><i></i>
							  {{$questions[$i]->option_b}}</label>
							</div>
							<div>
								<label class="qusRadio">
							  <input type="radio" value="c" disabled name="answer" qid={{$questions[$i]->id}} qindex={{$i}}><i></i>
							  {{$questions[$i]->option_c}}</label>
							</div>
							<div>
								<label class="qusRadio">
							  <input type="radio" value="d" disabled name="answer" qid={{$questions[$i]->id}} qindex={{$i}}><i></i>
							  {{$questions[$i]->option_d}}</label>
							</div>
							  
							<br/>
							<div class="form-group">       
							  <a href="javascript:void(0)" class="btn btn-primary nxtquestion" style="float:right;" qindex={{$i+1}}>Next</a>
							</div>
						  </form>
						  
						</div>
					@endfor
					@endif
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- screipt section-->
@stop
@section('mrinscript')
<!-- exam page script section -->
	<script type="text/javascript">
		var questions = {!! str_replace("'", "\'", json_encode($questions)) !!};
		validateChecked(0);
		
		$(document).on('click','.nxtquestion',function(e){
			var qindex = $(e.currentTarget).attr('qindex');
			loadquestion(qindex);
		});
		
		function loadquestion(qindex){
			var length = questions.length;
			if(qindex>=0 && qindex<length){
				var nindex = parseInt(qindex)+1;
				var question = questions[qindex];
				var html='<p class="portalQus">'+question['question']+'</p>\
				<br/><form>\
				<div><label class="qusRadio"><input type="radio" value="a" disabled name="answer" qid="'+question['id']+'" qindex="'+qindex+'"><i></i>\
				'+question['option_a']+'</label></div>\
				<div><label class="qusRadio"><input type="radio" value="b" disabled name="answer" qid="'+question['id']+'" qindex="'+qindex+'"><i></i>\
				'+question['option_b']+'</label></div>\
				<div><label class="qusRadio"><input type="radio" value="c" disabled name="answer" qid="'+question['id']+'" qindex="'+qindex+'"><i></i>\
				'+question['option_c']+'</label></div>\
				<div><label class="qusRadio"><input type="radio" value="d" disabled name="answer" qid="'+question['id']+'" qindex="'+qindex+'"><i></i>\
				'+question['option_d']+'</label></div>\
				<br/>\
				<div class="form-group">';
				if(nindex==(length)){
					html+='';
				}
				else{
					html+='<a href="javascript:void(0)" class="btn btn-primary nxtquestion" style="float:right;" qindex='+nindex+'>Next</a>';
				}
				
				html+='</div></form>';
				
				$("#questionview").html(html);
				$("#qcount").html(nindex);
				// now mark the question number as selected 
				$(".exammodel li").find(".qActive").removeClass('qActive');
				$($(".exammodel .nxtquestion")[qindex]).addClass('qActive');
				validateChecked(qindex);
			}
		}
		
		function validateChecked(qindex){
			var length = questions.length;
			if(qindex>=0 && qindex<length){
				var question = questions[qindex];
				var right_option = question['right_option'];
				var given_ans = question['given_ans'];
				if(given_ans!='undefine'){
					$.each($('input[name="answer"]'),function(i,item){
						if(right_option==$(item).val()){
							//$(item).attr('style','box-shadow: 0 0 0 2px green;');
							$(item).attr("checked", "checked");
							$(item).next().addClass('right');
						}
						
						if(given_ans==$(item).val()){
							$(item).prop('checked',true);
							if(right_option!=given_ans){
								//$(item).attr('style','box-shadow: 0 0 0 2px red;');
								$(item).attr("checked", "checked");
								$(item).next().addClass('wrong');
							}
						}
					});
				}
				
			}
		}
		
	</script>
	@endsection 