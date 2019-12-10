<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class PackagesController extends Controller
{
   public function index() {

        $packages = DB::table('packages')
                ->join('subjects', 'subjects.id', '=', 'packages.subject_id')
                ->select('packages.*', 'subjects.name as subject_name')
                ->where('packages.is_deleted', '=', 0)
                ->get();

        return view('students.packages.index', compact('packages'));
    }

public function package_details($id) {
        $packages = DB::table('packages')
                ->join('subjects', 'subjects.id', '=', 'packages.subject_id')
                ->select('packages.*', 'subjects.name as subject_name')
                ->where('packages.id', '=', $id)
                ->get();


        return view('students.packages.details', compact('packages'));
    }


}
