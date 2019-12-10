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
              <a href="{{route('notifications.index')}}"><span><i class="pe-7s-box2"></i></span>Manage Notifications</a>
            <a href="{{route('news.index')}}"><span><i class="pe-7s-graph2"></i></span> Manage News</a>
            
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="dashbar">
                <div class="col-md-12 text-right">
                    <a title="Add News" href="{{ URL::to('/news/create') }}" class="btn btn-action"><i class="fa fa-plus"></i> Add News</a>
                     <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card"> 
                    <div class="header">News</div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                    <th width="3%">SL No</th>
                                        <th width="600px">News</th>
                                        <th>Link</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php $slno = 1; @endphp
                                    @if($news)
                                    @foreach($news as $n)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{substr($n->news,0,300)}}...</td>
                                        <td>{{$n->link}}</td>
                                        <td class="text-right">
                                            @if($n->is_active == 0)
                                            <a title="Inactive" href="{{ URL::to('news/change-status/'.$n->id) }}" class="action text-success btn-icon like"><i class="fa fa-lock"></i></a>
                                            @else
                                            <a title="Active" href="{{ URL::to('news/change-status/'.$n->id) }}" class="action text-danger btn-icon like"><i class="fa fa-unlock"></i></a>
                                            @endif
                                             <a title="Edit" href="{!! URL::to('news/'.$n->id.'/edit') !!}" class="action text-primary btn-icon edit"><i class="fa fa-edit"></i></a>
                                            <a title="Remove" href="#" data-toggle="modal" data-target="#confirm-delete{{$n->id}}" class="action text-danger btn-icon remove"><i class="fa fa-trash"></i></a>

                                            <div class="modal fade" id="confirm-delete{{$n->id}}" role="dialog" style="text-align: left;">
                                                <div class="modal-dialog" style="width: 35%;">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Confirm Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>You are about to delete <b><i class="title"></i></b> record, this procedure is irreversible.</p>
                                                            <p>Do you want to proceed?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(array('route' => ['news.destroy',$n->id],'method'=>'post')) !!}
                                                            {!! Form::hidden('id',$n->id) !!}
                                                            <button type="submit" class="btn btn-danger btn-ok" href="">Delete</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
@endsection