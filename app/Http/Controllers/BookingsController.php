<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserPackage;
use Auth;
use Validator;
use Session;
use DB;

class BookingsController extends Controller {
    
    

    public function index() {
        $bookings = $users = DB::table('user_packages')
                        ->join('users', 'users.id', '=', 'user_packages.user_id')
                        ->join('packages', 'packages.id', '=', 'user_packages.package_id')
                        ->select('user_packages.*', 'users.name', 'users.phone_number', 'packages.name as package_name','packages.price as package_price','packages.validity as package_validity')
                        ->where('user_packages.is_deleted','=',0)
                        ->get();

        
        return view('admin.views.booking.bookings', compact('bookings'));
    }
    


}

