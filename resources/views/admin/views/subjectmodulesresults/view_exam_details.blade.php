<?php
$total_questions = 0;
$right_answers = 0;
$wrong_answers = 0;
$unattemted = 0;

foreach ($questions as $q) {
    if(isset($q->given_ans) && $q->given_ans!=''){
        if($q->given_ans==$q->right_option){
            $right_answers+=1;
        }else{
            $wrong_answers+=1;
        }
    }else{
        $unattemted+=1;
    }

    $total_questions+=1;
}
?>
@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")

@section("content")

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
             <div class="dashbar">
                <div class="col-md-12 text-right">
                   
                   <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card"> 
                    <div class="header"><h3>Module Wise Questions</h3></div>
                    <div class="content">
                        <table id="" class="table table-hover">
                            <thead>
                                <tr>
                                    <td colspan="2">Total Answers</td>
                                    <td align="right" colspan="2"><b><?=$total_questions?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Right Answers</td>
                                    <td align="right" colspan="2"><b><?=$right_answers?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Wrong Answers</td>
                                    <td align="right" colspan="2"><b><?=$wrong_answers?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Unattempted Answers</td>
                                    <td align="right" colspan="2"><b><?=$unattemted?></b></td>
                                </tr>
                                
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card"> 
                    <div class="header"><h3>Module Wise Questions</h3></div>
                    <div class="content">
                        <div id="piechart"></div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card"> 
                    <div class="header"><h3>Module Wise Questions</h3></div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <div class="table-responsive">
                                <table id="" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="60px">SL No</th>
                                            <th width="300px">Question</th>
                                            <th>Option A</th>
                                            <th>Option B</th>
                                            <th>Option C</th>
                                            <th>Option D</th>
                                            <th width="100px">Ans Given</th>
                                            <th width="100px">Right Option</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $slno = 1; ?>
                                        @if($questions)
                                        @foreach($questions as $question)
                                        <tr>
                                            <td>{{$slno}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>{{$question->option_a}}</td>
                                            <td>{{$question->option_b}}</td>
                                            <td>{{$question->option_c}}</td>
                                            <td>{{$question->option_d}}</td>
                                            <td>{{(isset($question->given_ans))?$question->given_ans:''}}</td>
                                            <td>{{$question->right_option}}</td>
                                        </tr>
                                        <?php $slno = $slno + 1; ?>    
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Questions', 'Total No'],
  ['Right Answers', <?php echo $right_answers; ?>],
  ['Wrong Answers', <?php echo $wrong_answers; ?>],
  ['Unattempted Answers', <?php echo $unattemted; ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Report Analysis', 'width':400, 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
@endsection