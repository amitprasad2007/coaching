<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Subject;
use Auth;
use URL;
use App\Models\Package;


class PackagesController extends Controller
{
    public function index(){
        $packages = DB::table('packages')
                        ->join('subjects', 'subjects.id', '=', 'packages.subject_id')
                        ->select('packages.*', 'subjects.name as subject_name')
                        ->where('packages.is_deleted','=',0)
                        ->get();
                        return view('admin.views.packages.packages');
                    }



    public function index11(Request $request)
    {if ($request->ajax()) {
        $packages = DB::table('packages')
                        ->join('subjects', 'subjects.id', '=', 'packages.subject_id')
                        ->select('packages.*', 'subjects.name as subject_name')
                        ->where('packages.is_deleted','=',0)
                        ->get();
                     return Datatables::of($packages)
                     ->addIndexColumn()
                      ->editColumn("action_btns", function($packages) {
                        return '<a href="javascript:void(0)" class="btn btn-info btn-student-delete"
                                data-id="' . $packages->id . '">AddQ:</a>
                                <a href="javascript:void(0)" class="btn btn-success btn-student-delete" 
                                data-id="' . $packages->id . '">ViewQ:</a>';})
                    ->rawColumns(["action_btns"])
                    ->make(true);}
            return view('admin.views.packages.packages');
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
        return view('admin.views.packages.add_packages',compact('datas'));

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
           
            $package = new Package;
            
            $package->company_id=$company_id;
            $package->name   =  $request->name;
            $package->subject_id = $request->subject_id;
            $package->no_of_papers = $request->no_of_papers;
            $package->validity = $request->validity;
            $package->price = $request->price;
            $package->overview =$request->overview;
            $package->benifit =$request->benifit;

            $package->save();
            
            $request->session()->flash("message","Package has been created successfully");
          return redirect('packages');


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
