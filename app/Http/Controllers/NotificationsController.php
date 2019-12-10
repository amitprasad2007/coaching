<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use URL;
use App\Models\Notification;

class NotificationsController extends Controller
{
    public function index()
    {  
        $notifications = DB::table('notifications')
        ->where('is_deleted','=',0)
        ->get();
        
        return view('admin.views.notifications.notifications');
    }
    public function index11(Request $request)
    {   if ($request->ajax()) {
        $notifications = DB::table('notifications')
        ->where('is_deleted','=',0)
       
        ->get();
         return Datatables::of($notifications)
                    ->addIndexColumn()
                    ->make(true);}


        return view('admin.views.notifications.notifications');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.notifications.add_notifications');
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
           
            $notification = new Notification;
            
            $notification->company_id=$company_id;
            $notification->title   =  $request->title;
            $notification->message = $request->message;
            

            $notification->save();
            
            $request->session()->flash("message","Notification has been created successfully");
          return redirect('notifications');

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
