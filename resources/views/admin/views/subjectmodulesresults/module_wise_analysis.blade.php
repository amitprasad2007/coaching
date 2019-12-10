<?php
$total = 0;
$passed = 0;
$failed = 0;

foreach ($exams as $exam) {
    if($exam->total_marks_obtain>=$exam->pass_marks){
        $passed+=1;
    }else{
        $failed+=1;
    }

    $total+=1;
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
                    <div class="header"><h1>Module Wise Questions</h1>
                    </div>
                    <div class="content">
                        <div class="fresh-datatables">
                            <table id="" class="table table-hover">
                                <thead>
                                    <tr>
                                        <td colspan="2">Total Attempts</td>
                                        <td colspan="2"><b><?=$total?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Passed Attempts</td>
                                        <td colspan="2"><b><?=$passed?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Failed Attempts</td>
                                        <td colspan="2"><b><?=$failed?></b></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card"> 
                    <div class="header">Module Wise Questions</div>
                    <div class="content">
                        <div id="piechart"></div>
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
  ['Passed Attempts', <?php echo $passed; ?>],
  ['Failed Attempts', <?php echo $failed; ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Report Analysis', 'width':400, 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
@endsection