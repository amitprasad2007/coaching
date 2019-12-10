<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Validator;
use URL;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UserController extends Controller{

    
    public function index()
    { $data = User::
                    where('is_deleted',0)
                     ->role('Student')
                    ->get();

                        return view('admin.views.student.list_students'); }
 public function index11(Request $request)
    {if ($request->ajax()) {

            $data = User::
                    where('is_deleted',0)
                    ->role('Student')
                    ->get();

            return Datatables::of($data)
              ->addIndexColumn()
                    ->editColumn("action_btns", function($data) {
                            return '<a href="' . URL::to('/edit-students/' . $data->id) . '" class="btn btn-info class-section-edit" data-id="'.$data->id.'">Edit</a>
                           <a href="javascript:void(0)" class="btn btn-danger btn-student-delete" data-id="' . $data->id . '">Delete</a>';})
                    ->editColumn("status", function($data) {
            if ($data->is_active == 1 ) {
                return '<a href="' . URL::to('/active-students/' . $data->id) . '" class="btn btn-success" data-id="' . $data->id . '">Active</a>';
            } else {
                return '<a href="' . URL::to('/inactive-students/' . $data->id) . '" class="btn btn-danger" data-id="' . $data->id . '">Inactive</a>';
            }
        })
                    ->rawColumns(["action_btns","status"])
                    ->make(true);}
                    return view('admin.views.student.list_students'); } 


    public function create() {
        
        return view('admin.views.student.add_students');
         }

    public function store(Request $request) {
        $company_id = Auth::guard()->user()->id;
        $User = new User;
            $User->company_id=$company_id;
            $User->role = 2;
            $User->name = $request->name;
            $User->dob = date("Y-m-d",strtotime($request['dob']));
            $User->phone_number = $request->phone_number;
            $User->alternate_phone_number = $request->alternate_phone_number;
            $User->email = $request->email;
            $User->password = bcrypt($request['password']);
            $User->address= $request->address;
            $User->tenth_percentage= $request->tenth_percentage;
            $User->tenth_board_name= $request->tenth_board_name;
            $User->twlth_percentage= $request->twlth_percentage;
            $User->twlth_board_name= $request->twlth_board_name;
            $User->ug_percentage= $request->ug_percentage;
            $User->ug_university_name= $request->ug_university_name;
            $User->pg_percentage= $request->pg_percentage;
            $User->pg_university_name= $request->pg_university_name;
            $User->city= $request->city;
            $User->state= $request->state;
            $User->country= $request->country;
            $valid_images = array("png","jpg","jpeg","gif");
            if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
                $profile_image = $request->image;
                $imageName = time().".".$profile_image->getClientOriginalName();
                $profile_image->move("resource/assets/images/User/",$imageName);
                $uploadedImage = "resource/assets/images/User/".$imageName;
                $User->image  = $uploadedImage;
            } $User->save();
            
            $request->session()->flash("message","Student has been created successfully");
            
            return redirect("add-students");
        }
public function editstudent($id = null) {
             $users = user::find($id);
         
            return view("admin.views.student.edit_student", compact('users'));
        }

 public function editSavestudentData(Request $request) {
            $user_id = $request->id;
            $User = User::find($user_id);
            $User->name = $request->name;
            $User->dob = date("Y-m-d",strtotime($request['dob']));
            $User->phone_number = $request->phone_number;
            $User->alternate_phone_number = $request->alternate_phone_number;
            $User->email = $request->email;
            $User->password = bcrypt($request['password']);
            $User->address= $request->address;
            $User->tenth_percentage= $request->tenth_percentage;
            $User->tenth_board_name= $request->tenth_board_name;
            $User->twlth_percentage= $request->twlth_percentage;
            $User->twlth_board_name= $request->twlth_board_name;
            $User->ug_percentage= $request->ug_percentage;
            $User->ug_university_name= $request->ug_university_name;
            $User->pg_percentage= $request->pg_percentage;
            $User->pg_university_name= $request->pg_university_name;
            $User->city= $request->city;
            $User->state= $request->state;
            $User->country= $request->country;
            $valid_images = array("png","jpg","jpeg","gif");
            if($request->hasFile("image") && in_array($request->image->extension(),$valid_images)){
                $profile_image = $request->image;
                $imageName = time().".".$profile_image->getClientOriginalName();
                $profile_image->move("resource/assets/images/User/",$imageName);
                $uploadedImage = "resource/assets/images/User/".$imageName;
                $User->image  = $uploadedImage;}
                $User->save();
                $request->session()->flash("message", "Student has been updated successfully");
                return redirect("edit-students/".$user_id);
            }

 public function deleteStudent(Request $request) {
        
         $id = $request->delete_id;
        $student_data = User::find($id);
        if (isset($student_data->id)) {
            $status = $student_data->is_deleted;
            if ($status == 0) {
            $student_data->is_deleted = '1';
        }  $student_data->save();
            echo json_encode(array("status" => 1, "message" => "Student deleted successfully"));
        } else {
            echo json_encode(array("status" => 0, "message" => "Student doesnot exists"));
        }
        die();
    }

    public function changeStatus($id) {

        $user = User::find($id);
        $status = $user->is_active;

        if ($status == 0) {
            $user->is_active = '1';
            $msg = 'User Active.';
            $alert = 'alert-success';
        } else {
            $user->is_active = '0';
            $msg = 'User Inactive.';
            $alert = 'alert-danger';
        }
        $user->save();
        return redirect('students');
    }

    public function import() { 
        
        return view('admin.views.student.import');
    }

    public function import_store() {

        Excel::import(new UsersImport,request()->file('image'));
        return back();

    }

     public function export_data(){
        
       return Excel::download(new UsersExport, 'users.csv');

    }


        }


