<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Datatables;
use App\Models\Subject;
use App\Models\Package;
use App\Models\Topic;
use DB;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        $company_id = Auth::guard()->user()->id;
        $count_User=User::where('is_deleted','=',0)->count();
        $count_Subject=Subject::where('is_deleted','=',0)->count();
        $count_Package=Package::where('is_deleted','=',0)->count();
        $count_Topic=Topic::where('is_deleted','=',0)->count();

        $subjectmodules = DB::table('subject_modules')
                ->join('subjects', 'subjects.id', '=', 'subject_modules.subject_id')
                ->select('subject_modules.*', 'subjects.name as subject_name')
                ->where('subject_modules.is_deleted', '=', 0)
                ->where('subject_modules.company_id', '=', $company_id)
                ->get();

        $exams = DB::select("select `user_exams`.*, `subject_modules`.`name` as `subject_module_name`, `users`.`name` as `user_name`, `users`.`email` as `user_email` from `user_exams` inner join `subject_modules` on `subject_modules`.`id` = `user_exams`.`subject_module_id` inner join `users` on `users`.`id` = `user_exams`.`user_id` where user_exams.is_active=1 and user_exams.is_deleted=0
            and user_exams.company_id='$company_id'
            order by user_exams.exam_id desc limit 10 ");


        return view("admin.views.dashboard",
         ["count_User" => $count_User,
         "count_Subject"=>$count_Subject,
         "count_Package"=>$count_Package,
         "count_Topic"=>$count_Topic,
            "subjectmodules"=>$subjectmodules,
             "exams"=>$exams,
            ]);
    }
    public function getProfile() {
        $company_id = Auth::guard()->user()->id;
         $users = user::find($company_id);

    return view("admin.auth.profile",compact('users'));
    }
    
    public function postProfile(Request $request) {
            if($request->input()) {    
           
            $user = User::findOrFail(Auth::guard()->user()->id);
            $input = $request->input();
            if ($request->hasFile('image')) {

                $file = Input::file('image');
                $imageName = $file->getClientOriginalName();
                $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
                $image = time() . "." . $file_ext;
                $upload_image = $file->move('users', $image);
                $input['image'] = $image;
                if ($user->image) {
                    unlink(public_path('users_image/' . $user->image));
                }
            }$user->update($input);
            Session::flash('message', 'Profile updated successfully'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('profile'); 
        }
    }

 public function basic_settings(){
        return view('admin.auth.company_settings');
    }

    public function basic_settings_submit(Request $request){
        

        $input = $request->all();

        $input['company_id'] = Auth::guard()->user()->id;
        $input['is_active'] = 1;
        DB::table('company_settings')->insert($input);

        Session::flash('message', 'Your data has been saved successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('basic-settings');
    }

    }

