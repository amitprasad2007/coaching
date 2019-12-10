<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationsController extends Controller
{
     public function index() {
        
        $notifications = Notification::where('is_deleted','=',0)->get();
        return view('students.notifications.index', compact('notifications'));
    }
}
