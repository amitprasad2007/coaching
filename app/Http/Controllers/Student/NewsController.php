<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\News;

class NewsController extends Controller
{
     public function index() {

        $news = News::where('is_deleted','=',0)->get();
        

        
        return view('students.news.index', compact('news'));
    }
}
