<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Category;
use Auth;
use DB;
use DataTables;
Use URL;

class SubjectController extends Controller
{
    
    public function index() {

    $company_id = Auth::guard()->user()->id;
     $subjects =  DB::table('subjects')
                        ->leftJoin('categories', 'subjects.category_id', '=', 'categories.id')
                        ->select('subjects.*', 'categories.name as category_name')
                        ->where('subjects.is_deleted','=',0)
                        ->where('subjects.company_id','=',$company_id)
                        ->get();
    return view('admin.views.subject.subjects');}

public function index11(Request $request) {if ($request->ajax()) { 
     $subjects =  DB::table('subjects')
                        ->leftJoin('categories', 'subjects.category_id', '=', 'categories.id')
                        ->select('subjects.*', 'categories.name as category_name')
                        ->where('subjects.is_deleted','=',0)
                        ->get();
                         return Datatables::of($subjects)
                         ->addIndexColumn()
                    ->editColumn("action_btns", function($subjects) {
                        return '<a href="javascript:void(0)" class="btn btn-danger btn-subjects-delete" 
                           data-id="'.$subjects->id.'">Delete</a>';})
                    ->editColumn("status", function($subjects) {
            if ($subjects->is_active == 1 ) {
                return '<a href="' . URL::to('/active-subjects/' . $subjects->id) . '" class="btn btn-success" data-id="' . $subjects->id . '">Active</a>';} 
               else {return '<a href="' . URL::to('/inactive-subjects/' . $subjects->id) . '" class="btn btn-danger" data-id="' . $subjects->id .'"> Inactive</a>';}
        })->rawColumns(["action_btns","status"])
        ->make(true);}
        return view('admin.views.subject.subjects');}

   
    public function create()
    {
       

        $categories = DB::table('categories')->where('is_deleted', '=', 0)->get();
        return view('admin.views.Questions.add_subject',compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_id = Auth::guard()->user()->id;
        $subject = new Subject;
             $subject->company_id=$company_id;
             $subject->name   = $request->name ;
             $subject->code   = $request->code ;
             $subject->category_id = $request->category_id;
              $subject->save();
             
             $request->session()->flash("message","Subject has been created successfully");
           return redirect('subjects');
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
    public function deletesubjects(Request $request) {
        
         $id = $request->delete_id;
           $subject_data = Subject::find($id);
        if (isset($subject_data->id)) {
            $status = $subject_data->is_deleted;
            if ($status == 0) {
            $subject_data->is_deleted = '1';
        }  $subject_data->save();
            echo json_encode(array("status" => 1, "message" => "Subject deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "Subject doesnot exists"));
        }
        die();
    }



    public function changeStatus($id) {

        $subject = Subject::find($id);
        $status = $subject->is_active;

        if ($status == 0) {
            $subject->is_active = '1';
            $msg = 'subject Active.';
            $alert = 'alert-success';
        } else {
            $subject->is_active = '0';
            $msg = 'subject Inactive.';
            $alert = 'alert-danger';
        }
        $subject->save();
        return redirect('subjects');
    }
}
