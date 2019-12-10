<?php

namespace App\Http\Controllers\Student;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\User;
use Session;

class HomeController extends Controller
{
   public function index() {
        
     	 $user_id = Auth::guard()->user()->id;

        $data['total_exams'] = DB::select("select count(*) as exam from user_exams where is_active=1 and is_deleted=0");

        $data['total_exams1'] = DB::select("select count(*) as passed from user_exams where is_active=1 and is_deleted=0 and pass_marks<=total_marks_obtain");

        $data['total_exams2'] = DB::select("select count(*) as failed from user_exams where is_active=1 and is_deleted=0 and pass_marks>total_marks_obtain");

        $exams = DB::select("select `user_exams`.*, `subject_modules`.`name` as `subject_module_name`, `users`.`name` as `user_name`, `users`.`email` as `user_email` from `user_exams` inner join `subject_modules` on `subject_modules`.`id` = `user_exams`.`subject_module_id` inner join `users` on `users`.`id` = `user_exams`.`user_id` where user_exams.is_active=1 and user_exams.is_deleted=0
            and user_exams.user_id='$user_id'
            order by user_exams.exam_id desc ");

        return View('students.dashboard',compact('data','exams'));
    }


public function getProfile() {
        
        if(!Auth::guard()->check()) {
            Session::flash('message', 'Authentication require.'); 
            Session::flash('alert-class', 'alert-warning');
            return redirect('student/dashboard');
        }
        return View('students.auth.profile');
    }
    
    public function postProfile(Request $request) {
        
        if(!Auth::guard()->check()) {
            Session::flash('message', 'Authentication require.'); 
            Session::flash('alert-class', 'alert-warning');
            return redirect('students.admin');
        }
        if($request->input()) {    
            //echo '<pre>'; print_r(Input::file('image')); die('');
            $user = User::findOrFail(Auth::guard()->user()->id);
            $input = $request->input();
            /*if($request->input('new_password')) {
                $input['password'] = bcrypt($request->input('new_password'));
            }*/           
            $user->update($input);
            Session::flash('message', 'Profile updated successfully'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('student/profile'); 
        }
    }



}


