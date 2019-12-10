<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Subject;
use App\Models\SubjectModule;
use Auth;
use URL;

class SubjectModulesController extends Controller
{
    
    public function index(Request $request)
    {          
         
            $subjectmodules = DB::table('subject_modules')
                ->join('subjects', 'subjects.id', '=', 'subject_modules.subject_id')
                ->select('subject_modules.*', 'subjects.name as subject_name')
                ->where('subject_modules.is_deleted', '=', 0)
                ->get();
                return view('admin.views.subject.subjectmodules');
    }


    public function index11(Request $request)
    {          
         if ($request->ajax()) {
            $subjectmodules = DB::table('subject_modules')
                ->join('subjects', 'subjects.id', '=', 'subject_modules.subject_id')
                ->select('subject_modules.*', 'subjects.name as subject_name')
                ->where('subject_modules.is_deleted', '=', 0)
                ->get();
        return Datatables::of($subjectmodules)
                        ->addIndexColumn()
                     ->editColumn("action_btns", function($subjectmodules) {
                            return '<a href="' . URL::to('/edit-subjectmodules/' . $subjectmodules->id) . '" class="btn btn-info class-section-edit" data-id="'.$subjectmodules->id.'">Edit</a>
                           <a href="javascript:void(0)" class="btn btn-danger btn-subjectmodules-delete" data-id="' . $subjectmodules->id . '">Delete</a>
                            ';})
                    ->editColumn("status", function($subjectmodules) {
            if ($subjectmodules->is_active == 1 ) {
                return '<a href="' . URL::to('/active-subjectmodules/'. $subjectmodules->id) . '" class="btn btn-success">Active</a>';
            } else {
                return '<a href="' . URL::to('/inactive-subjectmodules/'. $subjectmodules->id) . '" class="btn btn-danger" >Inactive</a>';
            }
        })
                    ->rawColumns(["action_btns","status"])
                    ->make(true);}
                        return view('admin.views.subject.subjectmodules');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $subjects = Subject::where('is_deleted', '=', 0)->get();
        $datas['subjects'] = $subjects;
        return view('admin.views.subject.add_subjectmodules', compact('datas'));
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
           
            $subjectmodule = new SubjectModule;
            
            $subjectmodule->company_id=$company_id;
            $subjectmodule->name   =  $request->name;
            $subjectmodule->subject_id = $request->subject_id;
            $subjectmodule->total_marks = $request->total_marks;
            $subjectmodule->pass_marks = $request->pass_marks;
            $subjectmodule->negative_marks_on = $request->negative_marks_on;
            $subjectmodule->exam_time =$request->exam_time;
            $subjectmodule->save();
            
            $request->session()->flash("message","SubjectModule has been created successfully");
          return redirect('subjectmodules');
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
    public function editsubjectmodules($id = null) {
             $subjectmodules = SubjectModule::find($id);
             $subjects = Subject::where('is_deleted', '=', 0)->get();
        $datas['subjects'] = $subjects;
    return view("admin.views.subject.edit_subjectmodules", compact('subjectmodules','datas'));
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editupdatesubjectmodulesData(Request $request)
    {   
          $subjectmodule_id = $request->id;           
           $subjectmodule = SubjectModule::find($subjectmodule_id);
            $subjectmodule->name   =  $request->name;
            $subjectmodule->subject_id = $request->subject_id;
            $subjectmodule->total_marks = $request->total_marks;
            $subjectmodule->pass_marks = $request->pass_marks;
            $subjectmodule->negative_marks_on = $request->negative_marks_on;
            $subjectmodule->exam_time =$request->exam_time;
            $subjectmodule->save();            
            $request->session()->flash("message","SubjectModule has been Updated successfully");
          return redirect('subjectmodules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSubjectmodules(Request $request) {
        
         $id = $request->delete_id;
        $subjectmodule_data = SubjectModule::find($id);
        if (isset($subjectmodule_data->id)) {
            $status = $subjectmodule_data->is_deleted;
            if ($status == 0) {
            $subjectmodule_data->is_deleted = '1';
        }  $subjectmodule_data->save();
            echo json_encode(array("status" => 1, "message" => "SubjectModule deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "SubjectModule doesnot exists"));
        }
        die();
    }


     public function changeStatus($id) {

        $subjectmodule = SubjectModule::find($id);
        $status = $subjectmodule->is_active;

        if ($status == 0) {
            $subjectmodule->is_active = '1';
            $msg = 'User Active.';
            $alert = 'alert-success';
        } else {
            $subjectmodule->is_active = '0';
            $msg = 'User Inactive.';
            $alert = 'alert-danger';
        }
        $subjectmodule->save();
        return redirect('subjectmodules');
    }
}
