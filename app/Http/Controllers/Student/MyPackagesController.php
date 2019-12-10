<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class MyPackagesController extends Controller
{
    public function index() {

        $user_id =  Auth::guard()->user()->id;
        
        $packages = DB::table('packages')
                ->join('subjects', 'subjects.id', '=', 'packages.subject_id')
                ->join('user_packages', 'packages.id', '=', 'user_packages.package_id')
                ->select('packages.*', 'subjects.name as subject_name', 'user_packages.booking_date','user_packages.exam_given','user_packages.expire_date')
                ->where('user_packages.user_id', '=', $user_id)
                ->get();

         return view('students.mypackages.index', compact('packages'));
    }
    
    public function details($id){
        $user_id =  Auth::guard()->user()->id;
        
        $packages = DB::table('packages')
                ->join('subjects', 'subjects.id', '=', 'packages.subject_id')
                ->join('user_packages', 'packages.id', '=', 'user_packages.package_id')
                ->select('packages.*', 'subjects.name as subject_name', 'user_packages.booking_date','user_packages.exam_given','user_packages.expire_date')
                ->where([['user_packages.package_id','=',$id],['user_packages.user_id','=',$user_id]])
                ->get();

         return view('students.mypackages.details', compact('packages'));
    }
}
