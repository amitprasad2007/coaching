<?php

namespace App\Http\Controllers;

use App\Models\FacultyType;
use Illuminate\Http\Request;
use Datatables;
use Validator;
use App\User;
use Session;

class FacultyTypeController extends Controller
{
    
    public function addfacultytype()
    {
        return view("admin.views.faculty.add_faculty_type");
    }

  
    public function listfacultytype()
    {$data = FacultyType:: where('is_deleted',0)->get();
            return view('admin.views.faculty.list_staff_types',compact('data')); }



      public function saveFacultyType(Request $request) {
                $validator = Validator::make(array(
                            "type" => $request->faculty_type
                                ), array(
                            "type" => "required|unique:tbl_faculty_types"
                ));
    if ($validator->fails()) {
            
     return redirect("add-faculty-type")->withErrors($validator)->withInput();
                } else {
                    $faculty_type = new FacultyType;
                    $faculty_type->type = $request->faculty_type;
                    $faculty_type->status = $request->dd_status;
                    $faculty_type->save();
                    
                    $request->session()->flash("message","Faculty Type has been created successfully");
                    
                    return redirect("add-faculty-type");
                }
                
            }            
                
 public function destroy(Request $request) {
        $id=$request->id;

        $news = FacultyType::find($id);
        $status = $news->is_deleted;

        if ($status == 0) {
            $news->is_deleted = '1';
        } else {
            $news->is_deleted = '0';
        }
        $news->save();

        return redirect('list-faculty-type');
    }
            public function changeStatus($id) {

        $data = FacultyType::find($id);
        $status = $data->status;

        if ($status == 0) {
            $data->status = '1';
            $msg = 'News Active.';
            $alert = 'alert-success';
        } else {
            $data->status = '0';
            $msg = 'News Inactive.';
            $alert = 'alert-danger';
        }
        $data->save();

        return redirect('list-faculty-type');
    }

}