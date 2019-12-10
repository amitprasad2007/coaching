<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use Validator;
use URL;
use DB;
use App\Models\Topic;
use App\Imports\TopicImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TopicExport;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('topic_questions')
                     ->join('topics', 'topics.id', '=', 'topic_questions.topic_id')
                     ->select('topic_questions.*', 'topics.name as topic_name')
                     ->where('topic_questions.is_deleted','=',0)
                     ->get();
                     return view('admin.views.Questions.topic',compact('questions') );
    
    }


     public function index11(Request $request)
    {if ($request->ajax()) {
        
        $topic = DB::table('topics')
                ->join('subjects', 'subjects.id', '=', 'topics.subject_id')
                ->select('topics.*', 'subjects.name as subject_name')
                ->where('topics.is_deleted', '=', 0)
                ->get();

        return Datatables::of($topic)
                    ->addIndexColumn()
                    ->editColumn("action_btns", function($topic) {
                        return                    '<a href="javascript:void(0)" class="btn btn-danger btn-topic-delete" 
                           data-id="'.$topic->id.'">Delete</a>';})
                    ->editColumn("status", function($topic) {
            if ($topic->is_active == 1 ) {
                return '<a href="' . URL::to('/active-topics/' . $topic->id) . '" class="btn btn-success" data-id="' . $topic->id . '">Active</a>';
            } else {
                return '<a href="' . URL::to('/inactive-topics/' . $topic->id) . '" class="btn btn-danger" data-id="' . $topic->id . '">Inactive</a>';
            }
        })
                    ->rawColumns(["action_btns","status"])
                    ->make(true);}
                    return view('admin.views.Questions.topic'); }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $company_id = Auth::guard()->user()->id;

        $subjects = DB::table('subjects')->where('is_deleted', '=', 0)->where('company_id', '=', $company_id)->get();
      
         return view('admin.views.Questions.add_topic',compact('subjects')); 
    }

     public function store(Request $request)
    { 
        $company_id = Auth::guard()->user()->id;
       $Topic = new Topic;
            $Topic->company_id=$company_id;
            $Topic->name   = $request->topic ;
            $Topic->subject_id = $request->subject_id;
             $Topic->save();
            
            $request->session()->flash("message","Topic has been created successfully");
          return redirect('topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletetopics(Request $request) {
        
         $id = $request->delete_id;
           $topic_data = Topic::find($id);
        if (isset($topic_data->id)) {
            $status = $topic_data->is_deleted;
            if ($status == 0) {
            $topic_data->is_deleted = '1';
        }  $topic_data->save();
            echo json_encode(array("status" => 1, "message" => "Topic deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "Topic doesnot exists"));
        }
        die();
    }
    public function changeStatus($id) {

        $topic = Topic::find($id);
        $status = $topic->is_active;

        if ($status == 0) {
            $topic->is_active = '1';
            $msg = 'Topic Active.';
            $alert = 'alert-success';
        } else {
            $topic->is_active = '0';
            $msg = 'Topic Inactive.';
            $alert = 'alert-danger';
        }
        $topic->save();
        return redirect('topics');
    }
     public function export_data(){
        return Excel::download(new TopicExport, 'sample.csv');

    }

    public function import_topic(){
        return view('admin.views.Questions.import_topic');
    }

    public function import_store(Request $request) {

        Excel::import(new TopicImport,request()->file('image'));
    return back();
    }    
}
