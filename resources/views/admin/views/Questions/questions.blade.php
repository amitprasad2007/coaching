@extends("admin.layouts.layout")
@php $user=auth()->user()->name; @endphp
@Section("title","Coaching Institute | $user")
@Section("user","$user")
@Section("username","$user")
@Section("userfullname","$user")
@Section("title","Coaching Institute")
@section("content")
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">    </ol>
            <a href="{{route('questions.index')}}"><span><i class="btn btn-action"></i></span> Topic Wise Question</a>
            <a href="{{route('topics.index')}}"><span><i class="btn btn-action"></i></span> All Topics</a>
            <a href="{{route('subjects.index')}}"><span><i class="btn btn-action"></i></span> All Subjects</a>
    </section>
    <section class="content-header">
     <ol class="breadcrumb">    </ol>

                    <div class="col-md-12 text-right">
                   <a title="Add Questions" href="{{route('questions.create')}}" class="btn btn-action"><i class="fa fa-plus"></i> Add Questions</a>
                    <a title="Import Data" href="{{route('questions.import')}}" class="btn btn-action"><i class="fa fa-download"></i> Import Data</a>
                    <a title="Export Data" href="{!! URL::to('topics/'.$questions[0]->topic_id.'/export_question_data') !!}" class="btn btn-action"><i class="fa fa-upload"></i> Export Data</a>
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>

        <h1>
           Topic Wise Questions
        </h1>    

    </section>
    <div class="box box-primary">
        <div class="box-header with-border"></div>
        <table class="table table-bordered data-table">
            <thead>
             <tr>
             <th width="3%"></th>
                <th>Topic</th>
                <th>Question</th>
                <th>Option A</th>
                <th>Option B</th>
                <th>Option C</th>
                <th>Option D</th>

            </tr>
            </thead>
             <tbody>
                 
             </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">

function format ( d) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Right Option:</td>'+
            '<td>'+d.right_option+'</td>'+
        '</tr>'+
     '</table>';
}
    $(document).ready(function() {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('questions-data') }}",
         columns: [
                {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
                },
                     {data: 'topic_name', name: 'topic_name'},
                    {data: 'question', name: 'question'},
                    {data: 'option_a', name: 'option_a'},
                    {data: 'option_b', name: 'option_b'},
                    {data: 'option_c', name: 'option_c'},
                    {data: 'option_d', name: 'option_d'},
                  ]});
    // Add event listener for opening and closing details
     $('.data-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
           
            tr.find('svg').attr('data-icon', 'plus-circle').toggleClass('fa-minus-square');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
           tr.find('svg').attr('data-icon', 'minus-circle') .toggleClass('fa-plus-square');
        }
    });
 });
       

</script>

@endsection