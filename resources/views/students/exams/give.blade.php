<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exam Chunk</title>
   <!--<meta name="description" content="">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="robots" content="all,follow">-->
    
      <!-- Bootstrap CSS-->
    <link href="{!! asset('design/students/assets/css/bootstrap.min.css') !!}" rel="stylesheet" />
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
<!--    <link rel="stylesheet" href="css/style.green.css" id="theme-stylesheet">-->
    <link href="{!! asset('design/students/assets/css/style.green.css') !!}" rel="stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link href="{!! asset('design/students/assets/css/custom.css') !!}" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
   <link href="{!! asset('design/students/assets/css/font-awesome.css') !!}" rel="stylesheet" />
    <link href="{!! asset('design/students/assets/css/lineicon.css') !!}" rel="stylesheet" />
    <!-- Font Icons CSS-->
    <!--<link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
		
	<!-- selected class -->
	<style>
		.qActive {
			color: #fff!important;
			background: #003bb1!important;
		}
	</style>
	<!-- end -->
  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>Exam</span><strong> Chunk</strong></div>
                  <!-- <div class="brand-text brand-small"><strong>DB</strong></div></a> -->
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="javascript:void(0);" class="nav-link logout">Exit Exam<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <div class="content-inner exambox">
            <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h4 class="no-margin-bottom">Exam : {{$module->name}} -> <span style="color:#003bb1">{{$module->subject_name}}</span><span class="pull-right" tval={{$module->exam_time}}>Time : &nbsp;<span id="timeelapsed"> {{$module->exam_time}}&nbsp;minute</span> </span></h4>
            </div>
          </header>
            <!--modual nav-->
            <section class="no-padding-bottom exam">
                <div class="container-fluid">
                    <div class="row">
					@if($topics)
						@foreach($topics as $topic)
						<div class="col-md-2">
                            <div class="bg-white has-shadow modualNav">
                                <a href="javascript:void(0)" class="tpclk" qindx="-1" tid="{{$topic->id}}">{{$topic->name}}</a>
                            </div>
                        </div>
						@endforeach
					@endif
                        <div class="col-md-2">
                            <div class="bg-white has-shadow modualNav">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <!-- Trending Articles-->
                        <div class="col-lg-4">
                          <div class="articles card">
                            <div class="card-header d-flex align-items-center">
                              <h2 class="h3">Select Question</h2>
                            </div>
                            <div class="card-body">
                                <ul class="exammodel">
									@for($i=1;$i<=$module->total_marks;$i++)
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
                        
                        <!--question-section-->
                        
                        <div class="col-lg-8">
                            <div class="articles card">
 
                                <div class="card-header">
                                	<div class="row">
                                		<div class="col-6">
		                                    <span id="qcount">1</span>. Question
		                                </div>
		                                <div class="col-6 text-right">
		                                	Total : <span><b>{{$module->total_marks}}</b> question</span>
		                                </div>
	                                </div>
                                </div>
								<?php //print_r($questions);?>
								@if($questions)
								@for($i=0;$i<1;$i++)
									<div class="card-body" id="questionview">
									
									  <p class="portalQus">{{$questions[$i]->question}}</p>
									  <form>
										<div>
										  <label class="qusRadio"><input type="radio" value="a" name="answer" qid={{$questions[$i]->id}} qindex={{$i}}><i></i> {{$questions[$i]->option_a}}</label>
										</div>
										<div>
										  <label class="qusRadio"><input type="radio" value="b" name="answer" qid={{$questions[$i]->id}} qindex={{$i}}><i></i> {{$questions[$i]->option_b}}</label>
										</div>
										<div>
										  <label class="qusRadio"><input type="radio" value="c" name="answer" qid={{$questions[$i]->id}} qindex={{$i}}><i></i> {{$questions[$i]->option_c}}</label>
										</div>
										<div>
										  <label class="qusRadio"><input type="radio" value="d" name="answer" qid={{$questions[$i]->id}} qindex={{$i}}><i></i> {{$questions[$i]->option_d}}</label>
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
			
          <!-- Page Footer-->
          <footer class="main-footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<p>Copyright &copy; {{ date('Y') }}. All right reserved.</p>
					</div>
				</div>
		</footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{!! asset('design/students/assets/js/tether.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/bootstrap.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/jquery.cookie.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/jquery.validate.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/chart.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/charts-home.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('design/students/assets/js/front.js') !!}" type="text/javascript"></script>
	
	<!-- exam page script section -->
	<script type="text/javascript">
		var questions = {!! str_replace("'", "\'", json_encode($questions)) !!};
		var answers=[];
		var time_taken=0;//minutes
		var csrf_field = '{{ csrf_field() }}';
		var intervalins='';
		var exam_time={{$module->exam_time}};
		var initiatite=true;
		var intervattime = (1000*60);
		var lastMent=60;//second
		$(document).ready(function(){
			$(".logout").bind('click',function(){
				if(confirm("Are you sure?\nYou want to exit from the exam.")){
					window.close();
				}
			});
			$(".tpclk").bind('click',function(e){
				var tip = $(e.currentTarget).attr('tid');
				var qindx = $(e.currentTarget).attr('qindx');
				
				$(".modualNav").find(".qActive").removeClass('qActive');
				$(e.currentTarget).addClass('qActive');
				
				if(qindx=='-1' || qindx=="-1"){
					for(var j=0;j<questions.length;j++){
						var qs = questions[j];
						if(qs['topic_id']==tip){
							qindx = j;
							$(e.currentTarget).attr('qindx',qindx);
							j=questions.length;
						}
					}
					loadquestion(qindx);
				}
				else{
					loadquestion(qindx);
				}
			});
			intervalins = setInterval(function(){
				if(initiatite){
					++time_taken;
					if(time_taken==exam_time){
						clearInterval(intervalins);
						examsubmit();
					}
					else{
						if((exam_time-time_taken)==1){
							$("#timeelapsed").attr('style','color:red;');
							clearInterval(intervalins);
							intervalins = setInterval(function(){
								--lastMent;
								$("#timeelapsed").html((lastMent)+'&nbsp;second');
								if(lastMent==0){
									++time_taken;
									clearInterval(intervalins);
									examsubmit();
								}
							},1000);
						}
						else{
							$("#timeelapsed").html((exam_time-time_taken)+'&nbsp;minute');
						}
					}
				}
				initiatite=true;
			},intervattime);
		});
		$(document).on('click','.nxtquestion',function(e){
			var qindex = $(e.currentTarget).attr('qindex');
			loadquestion(qindex);
		});
		// saved the answer
		$(document).on('click','input[name="answer"]',function(e){
			var qid = $(e.currentTarget).attr('qid');
			var ans = $(e.currentTarget).val();
			var qindex = $(e.currentTarget).attr('qindex');
			//save the answere in the question object
			var length = questions.length;
			if(qindex>=0 && qindex<length){
				questions[qindex]['given_ans']=ans;
			}
		});
		
		// submit the answers 
		$(document).on('click','.submitans',function(e){
			if(confirm("Are you sure?\nYou want to submit your paper.")){
				// do the submit section
				clearInterval(intervalins);
				examsubmit();
			}
		});
		
		function loadquestion(qindex){
			var length = questions.length;
			if(qindex>=0 && qindex<length){
				var nindex = parseInt(qindex)+1;
				var question = questions[qindex];
				var html='<p class="portalQus">'+question['question']+'</p>\
				<form>\
				<div><label class="qusRadio"><input type="radio" value="a" name="answer" qid="'+question['id']+'" qindex="'+qindex+'"><i></i>\
				'+question['option_a']+'</div></label>\
				<div><label class="qusRadio"><input type="radio" value="b" name="answer" qid="'+question['id']+'" qindex="'+qindex+'"><i></i>\
				'+question['option_b']+'</div></label>\
				<div><label class="qusRadio"><input type="radio" value="c" name="answer" qid="'+question['id']+'" qindex="'+qindex+'"><i></i>\
				'+question['option_c']+'</div></label>\
				<div><label class="qusRadio"><input type="radio" value="d" name="answer" qid="'+question['id']+'" qindex="'+qindex+'"><i></i>\
				'+question['option_d']+'</div></label>\
				<br/>\
				<div class="form-group">';
				if(nindex==(length)){
					html+='<a href="javascript:void(0)" class="btn btn-primary submitans" style="float:right;">Submit</a>';
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
				var given_ans = question['given_ans'];
				// ans given
				if(given_ans!='undefine'){
					$.each($('input[name="answer"]'),function(i,item){
						if(given_ans==$(item).val()){
							$(item).prop('checked',true);
						}
					});
				}
			}
		}
		
		function examsubmit(){
			var frmHtml='<div style="display:none;"><form action="submit" method="post">'+csrf_field+'\
			<input type="hidden" id="ansquestion" name="questions" value="">\
			<input type="hidden" name="time_taken" value="'+time_taken+'">\
			<input type="submit" id="anssubmit"></form></div>';
			$("html body").append(frmHtml);
			$("#ansquestion").val(JSON.stringify(questions));
			$("#anssubmit").trigger("click");
		}
	</script>
	<!-- script end of exam page -->
  </body>
</html>