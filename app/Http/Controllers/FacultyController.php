<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Models\FacultyType;
use App\Models\Gender;
use Validator;
use App\Imports\Facultyimport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Facultyexport;
use Hash;

class FacultyController extends Controller
{
   
   public function pages(){
        return view('admin.views.faculty.pages');
    }

    public function addfaculty()
    {
        
        $types = FacultyType::where(["status" => 1])->get();
        $genders= Gender::where(["status" => 1])->get();
        return view("admin.views.faculty.add_faculty", ["types" => $types],["genders" => $genders]);
    }



    public function saveFaculty(Request $request) {
        $validator = Validator::make(array(
                    "faculty_type" => $request->dd_type,
                    "faculty_name" => $request->faculty_name,
                    "email" => $request->faculty_email,
                    "faculty_designation" => $request->faculty_designation,
                    "faculty_phone" => $request->faculty_phone,
                    "faculty_address" => $request->faculty_address
                        ), array(
                    "faculty_type" => "required",
                    "faculty_name" => "required",
                    "email" => "required|unique:tbl_faculties",
                    "faculty_designation" => "required",
                    "faculty_phone" => "required",
                    "faculty_address" => "required",
        ));
        if ($validator->fails()) {
            return redirect("add-faculty")->withErrors($validator)->withInput();
        } else {$faculty = new Faculty;
            $faculty->faculty_type_id = $request->dd_type;
            $faculty->name = $request->faculty_name;
            $faculty->email = $request->faculty_email;
            $faculty->password = Hash::make($request['faculty_password']);
            $faculty->designation = $request->faculty_designation;
            $faculty->phone_no = $request->faculty_phone;
            $faculty->gender_id = $request->dd_gender;
            $valid_images = array("png", "jpg", "gif", "jpeg");
            if ($request->hasFile("faculty_photo") && in_array($request->faculty_photo->extension(), $valid_images)) {
                $image = $request->faculty_photo;
                $fileName = time() . "." . $image->getClientOriginalName();
                $image->move("resource/assets/images/faculty/", $fileName);
                $uploadedImageName = "resource/assets/images/faculty/" . $fileName;
                $faculty->profile_photo = $uploadedImageName;
            }    

            $faculty->address = $request->faculty_address;
            $faculty->save();

            $request->session()->flash("message", "Faculty has been created successfully");
            return redirect("add-faculty");
        } 
    }
             
     public function editfaculty($id)
    {
        $data = Faculty::find($id);

        $types = FacultyType::where(["status" => 1])->get();
        $genders= Gender::where(["status" => 1])->get();
        return view("admin.views.faculty.edit_faculty", compact('data','types','genders'));
    }    
public function saveeditFaculty(Request $request) {
        $id=$request->id;
      $faculty = Faculty::find($id);
            $faculty->faculty_type_id = $request->dd_type;
            $faculty->name = $request->faculty_name;
            $faculty->email = $request->faculty_email;
            $faculty->designation = $request->faculty_designation;
            $faculty->phone_no = $request->faculty_phone;
            $faculty->gender_id = $request->dd_gender;
            $valid_images = array("png", "jpg", "gif", "jpeg");
            if ($request->hasFile("faculty_photo") && in_array($request->faculty_photo->extension(), $valid_images)) {
                $image = $request->faculty_photo;
                $fileName = time() . "." . $image->getClientOriginalName();
                $image->move("resource/assets/images/faculty/", $fileName);
                $uploadedImageName = "resource/assets/images/faculty/" . $fileName;
                $faculty->profile_photo = $uploadedImageName;
            }    

            $faculty->address = $request->faculty_address;
            $faculty->save();
            $request->session()->flash("message", "Faculty has been updated successfully");
            return redirect("faculty/$request->id/edit");
        }
    

 public function facultydestroy(Request $request) {
        
         $id = $request->delete_id;
        $faculty_data = Faculty::find($id);
        if (isset($faculty_data->id)) {
            $status = $faculty_data->is_deleted;
            if ($status == 0) {
            $faculty_data->is_deleted = '1';
        }  $faculty_data->save();
            echo json_encode(array("status" => 1, "message" => "Faculty deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "Faculty doesnot exists"));
        }
        die();
    }
            public function changeStatus($id) {

        $data = Faculty::find($id);
        $status = $data->status;
     

        if ($status == 1) {
            $data->status = '0';
            $msg = 'News Active.';
            $alert = 'alert-success';
        } else {
            $data->status = '1';
            $msg = 'News Inactive.';
            $alert = 'alert-danger';
        }
        $data->save();

        return redirect('teacher');
    }

        public function import() { 
        
        return view('admin.views.faculty.import_faculty');
    }
    public function import_store() {

        Excel::import(new Facultyimport,request()->file('image'));
        return back();

    }

     public function export_data(){
        
       return Excel::download(new Facultyexport, 'faculty.csv');

    }
}
