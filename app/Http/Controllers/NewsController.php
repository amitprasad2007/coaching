<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\News;
use Auth;
use Redirect;
use View;
use Validator;
use Session;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller {

    public function index() {
        $company_id = Auth::guard()->user()->id;

        $news = News::where('is_deleted','=',0)->where('company_id','=',$company_id)->get();
        
        
        return view('admin.views.notifications.news', compact('news'));
    }

    public function create() {

        //$subjects = Subject::where('is_deleted','=',0)->get();
        //$datas['subjects'] = $subjects;
        return view('admin.views.notifications.add_news' );
    }

    public function store(Request $request) {

        $company_id = Auth::guard()->user()->id;
        $news = new News;
            
            $news->company_id=$company_id;
            $news->news   =  $request->news;
            $news->link = $request->link;
            $news->save();
             $request->session()->flash("message","News has been created successfully");
        return redirect('news');
    }

    public function show($id) {
        
    }

    public function edit($id) {

        $news = News::findOrFail($id);
        return view('admin.views.notifications.edit_news', compact('news'));
    }

    public function update(Request $request) {
          $id=$request->id;
         
            $company_id = Auth::guard()->user()->id;
            $news = News::findOrFail($id);
            $news->company_id=$company_id;
            $news->news   =  $request->news;
            $news->link = $request->link;
            $news->save();
             $request->session()->flash("message","News has been Updated successfully");
        return redirect('news');
        
    }

    public function destroy(Request $request) {
        $id=$request->id;

        $news = News::find($id);
        $status = $news->is_deleted;

        if ($status == 0) {
            $news->is_deleted = '1';
        } else {
            $news->is_deleted = '0';
        }
        $news->save();

        Session::flash('message', 'News deleted successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('news');
    }

    public function changeStatus($id) {

        $news = News::find($id);
        $status = $news->is_active;

        if ($status == 0) {
            $news->is_active = '1';
            $msg = 'News Active.';
            $alert = 'alert-success';
        } else {
            $news->is_active = '0';
            $msg = 'News Inactive.';
            $alert = 'alert-danger';
        }
        $news->save();

        Session::flash('message', $msg);
        Session::flash('alert-class', $alert);
        return redirect('news');
    }

}

?>