<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Auth;
use View;
use Validator;
use Session;
use DB;

//use Image;

class CouponsController extends Controller {
    
    
 

    public function index() {

        $coupons = Coupon::where('is_deleted', '=', 0)->get();
        return view('admin.views.coupon.coupons', compact('coupons'));
    }

    public function create() {

        return view('admin.views.coupon.add_coupon');
    }

    public function store(Request $request) {

        $input = $request->all();
        
        Coupon::create($input);
        Session::flash('message', 'Coupon added successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('coupons');
    }

    public function show($id) {
        
    }

    public function edit($id) {

        $coupon = Coupon::findOrFail($id);
        return view('admin.views.coupon.edit_coupon', compact('coupon'));
    }

    public function update(Request $request) {
        $id=$request->id;
        $input = $request->all();
        $coupon = Coupon::findOrFail($id);        
        $coupon->update($input);
        Session::flash('message', 'Coupon update successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('coupons');
    }

   public function destroy(Request $request) {
        $id=$request->id;
        $coupon = Coupon::find($id);
       
        $status = $coupon->is_deleted;

        if ($status == 0) {
            $coupon->is_deleted = '1';
        } else {
            $coupon->is_deleted = '0';
        }
        $coupon->save();

        Session::flash('message', 'Coupon deleted successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('coupons');
    }

    public function changeStatus($id) {

        $coupon = Coupon::find($id);
        $status = $coupon->is_active;

        if ($status == 0) {
            $coupon->is_active = '1';
            $msg = 'Coupon Active.';
            $alert = 'alert-success';
        } else {
            $coupon->is_active = '0';
            $msg = 'Coupon Inactive.';
            $alert = 'alert-danger';
        }
        $coupon->save();

        Session::flash('message', $msg);
        Session::flash('alert-class', $alert);
        return redirect('coupons');
    }

}

?>