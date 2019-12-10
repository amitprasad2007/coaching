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

<div class="container-fluid">
        <h2 class="no-margin-bottom">Welcome to Coaching Institue</h2>
    </div>
</header>
<ul class="breadcrumb">
    <div class="container-fluid">
        <li class="breadcrumb-item"><a href="{!! URL::to('student/dashboard') !!}">Dashboard</a></li>
    </div>
</ul>

<section class="updates no-padding-top" style="margin-top: 25px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                            <div class="text"><strong>{{$data['total_exams'][0]->exam}}</strong><br><small>Total Attempts</small></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                            <div class="text"><strong>{{$data['total_exams1'][0]->passed}}</strong><br><small>Total Passed Attempts</small></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                            <div class="text"><strong>{{$data['total_exams2'][0]->failed}}</strong><br><small>Total Failed Attempts</small></div>
                        </div>
                    </div>
                </div>
                <div class="recent-updates card" style="margin-top: 30px;">
                    <div class="card-header">
                       Given Exams History
                    </div>
                    <div class="card-body">
                 <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Module Name</th>
                                        <th>User Name</th>
                                        <th align="center">Total Marks</th>
                                        <th align="center">Pass Marks</th>
                                        <th align="center">Marks Obtained</th>
                                        
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($exams)
                                    @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$exam->subject_module_name}}</td>
                                        <td>{{$exam->user_name}}</td>
                                        <td align="center">{{$exam->total_marks }}</td>
                                        <td align="center">{{$exam->pass_marks}}</td>
                                        <td align="center">{{$exam->total_marks_obtain}}</td>
                                        
                                    </tr>
                                    <?php $slno = $slno + 1; ?>    
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                        
            </div>
            <!-- Recent Updates-->
            <div class="col-lg-4">

                <div class="recent-updates card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Analysis</h3>
                    </div>
                    <div class="card-body">
                        
                        <div id="piechart"></div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
        </div>
    </div>
</section>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Questions', 'Total No'],
  ['Passed Attempts', <?php echo $data['total_exams1'][0]->passed; ?>],
  ['Failed Attempts', <?php echo $data['total_exams2'][0]->failed; ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Report Analysis', 'width':350, 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</div>
@endsection