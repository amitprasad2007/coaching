<?php
namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Validator;
use URL;

class Teacher extends Controller{

    
    public function index()
    { $data = Faculty::
                    where('is_deleted',0)
                    ->get();

                        return view('admin.views.faculty.teacher'); }
 public function index11(Request $request)
    {if ($request->ajax()) {

            $data = Faculty::
                    where('is_deleted',0)
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn("action_btns", function($data) {
                            return '<a href="' . URL::to('/faculty/' . $data->id .'/edit') . '" class="btn btn-info class-section-edit" data-id="'.$data->id.'">Edit</a>
                           <a href="javascript:void(0)" class="btn btn-danger btn-teacher-delete" data-id="' . $data->id . '">Delete</a>
                            ';})
                    ->editColumn("status", function($data) {
            if ($data->status == 1 ) {
                return '<a href="' . URL::to('/faculty-status/' . $data->id) . '" class="btn btn-success" data-id="' . $data->id . '">Active</a>';
            } else {
                return '<a href="' . URL::to('/faculty-status/' . $data->id) . '" class="btn btn-danger" data-id="' . $data->id . '">Inactive</a>';
            }
        })
                    ->rawColumns(["action_btns","status"])
                    ->make(true);}
                    return view('admin.views.faculty.teacher'); } 
                }