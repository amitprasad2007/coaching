<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use DataTables;
use App\User;
use Auth;
class SubjectModulesResultsController extends Controller
{
    
    public function index()
     {
            $subjectmodules = DB::table('subject_modules')
                ->join('subjects', 'subjects.id', '=', 'subject_modules.subject_id')
                ->select('subject_modules.*', 'subjects.name as subject_name')
                ->where('subject_modules.is_deleted', '=', 0)
                ->get();
        
    return view('admin.views.subjectmodulesresults.subjectmodulesresults', compact('subjectmodules'));
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
                    
                    ->make(true);}
                        return view('admin.views.subjectmodulesresults.subjectmodulesresults');
    }

    
public function user_list() {
        $company_id = Auth::guard()->user()->id;
        $users = User::where([['is_deleted','=',0],['role','=',2],['company_id','=',$company_id]])->get();
        
        return view('admin.views.subjectmodulesresults.user_list', compact('users'));
    }
public function view_user_all_results($user_id){
        $exams = DB::table('user_exams')
                ->join('subject_modules', 'subject_modules.id', '=', 'user_exams.subject_module_id')
                ->join('users', 'users.id', '=', 'user_exams.user_id')
                ->select('user_exams.*', 'subject_modules.name as subject_module_name', 'users.name as user_name','users.email as user_email')
                ->where('user_exams.user_id', '=', $user_id)
                ->get();

        return view('admin.views.subjectmodulesresults.view_user_all_results', compact('exams'));
    }

public function view_exam_details($id){
        $exam_details = DB::table('user_exams')->where('exam_id','=',$id)->get();
        $questions = json_decode($exam_details[0]->user_ans);
        
        return view('admin.views.subjectmodulesresults.view_exam_details', compact('questions'));
    }
  public function view_user_passed_attempts($user_id){
        $exams = DB::select("select `user_exams`.*, `subject_modules`.`name` as `subject_module_name`, `users`.`name` as `user_name`, `users`.`email` as `user_email` from `user_exams` inner join `subject_modules` on `subject_modules`.`id` = `user_exams`.`subject_module_id` inner join `users` on `users`.`id` = `user_exams`.`user_id` where (`user_exams`.`user_id` = $user_id and `user_exams`.`pass_marks` <= user_exams.total_marks_obtain) ");
        

        return view('admin.views.subjectmodulesresults.view_user_passed_attempts', compact('exams'));
    }
     public function view_user_failed_attempts($user_id){

        $exams = DB::select("select `user_exams`.*, `subject_modules`.`name` as `subject_module_name`, `users`.`name` as `user_name`, `users`.`email` as `user_email` from `user_exams` inner join `subject_modules` on `subject_modules`.`id` = `user_exams`.`subject_module_id` inner join `users` on `users`.`id` = `user_exams`.`user_id` where (`user_exams`.`user_id` = $user_id and `user_exams`.`pass_marks` > user_exams.total_marks_obtain) ");

        return view('admin.views.subjectmodulesresults.view_user_failed_attempts', compact('exams'));
    }
      public function user_wise_analysis($user_id){
        $exams = DB::table('user_exams')
                ->join('subject_modules', 'subject_modules.id', '=', 'user_exams.subject_module_id')
                ->join('users', 'users.id', '=', 'user_exams.user_id')
                ->select('user_exams.*', 'subject_modules.name as subject_module_name', 'users.name as user_name','users.email as user_email')
                ->where('user_exams.user_id', '=', $user_id)
                ->get();

        return view('admin.views.subjectmodulesresults.module_wise_analysis', compact('exams'));
    }
public function view_all_results($module_id){
        $exams = DB::table('user_exams')
                ->join('subject_modules', 'subject_modules.id', '=', 'user_exams.subject_module_id')
                ->join('users', 'users.id', '=', 'user_exams.user_id')
                ->select('user_exams.*', 'subject_modules.name as subject_module_name', 'users.name as user_name','users.email as user_email')
                ->where('user_exams.subject_module_id', '=', $module_id)
                ->get();

        return view('admin.views.subjectmodulesresults.view_all_results', compact('exams'));
    }
      public function view_passed_attempts($module_id){
        $exams = DB::select("select `user_exams`.*, `subject_modules`.`name` as `subject_module_name`, `users`.`name` as `user_name`, `users`.`email` as `user_email` from `user_exams` inner join `subject_modules` on `subject_modules`.`id` = `user_exams`.`subject_module_id` inner join `users` on `users`.`id` = `user_exams`.`user_id` where (`user_exams`.`subject_module_id` = $module_id and `user_exams`.`pass_marks` <= user_exams.total_marks_obtain) ");
        

        return view('admin.views.subjectmodulesresults.view_passed_attempts', compact('exams'));
    }

   public function view_failed_attempts($module_id){

        $exams = DB::select("select `user_exams`.*, `subject_modules`.`name` as `subject_module_name`, `users`.`name` as `user_name`, `users`.`email` as `user_email` from `user_exams` inner join `subject_modules` on `subject_modules`.`id` = `user_exams`.`subject_module_id` inner join `users` on `users`.`id` = `user_exams`.`user_id` where (`user_exams`.`subject_module_id` = $module_id and `user_exams`.`pass_marks` > user_exams.total_marks_obtain) ");

        return view('admin.views.subjectmodulesresults.view_failed_attempts', compact('exams'));
    }

      public function view_ranks($module_id){

        $exams = DB::select("select `user_exams`.*, `subject_modules`.`name` as `subject_module_name`, `users`.`name` as `user_name`, `users`.`email` as `user_email` from `user_exams` inner join `subject_modules` on `subject_modules`.`id` = `user_exams`.`subject_module_id` inner join `users` on `users`.`id` = `user_exams`.`user_id` where `user_exams`.`subject_module_id` = $module_id order by 
            user_exams.total_marks_obtain desc ");

        return view('admin.views.subjectmodulesresults.view_ranks', compact('exams'));
    }

public function module_wise_analysis($module_id){
        $exams = DB::table('user_exams')
                ->join('subject_modules', 'subject_modules.id', '=', 'user_exams.subject_module_id')
                ->join('users', 'users.id', '=', 'user_exams.user_id')
                ->select('user_exams.*', 'subject_modules.name as subject_module_name', 'users.name as user_name','users.email as user_email')
                ->where('user_exams.subject_module_id', '=', $module_id)
                ->get();

        return view('admin.views.subjectmodulesresults.module_wise_analysis', compact('exams'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
