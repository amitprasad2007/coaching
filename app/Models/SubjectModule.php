<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectModule extends Model
{
    protected $table = "subject_modules";
    protected $primaryKey = "id";
    
    protected $fillable = ['name','subject_id','total_marks','pass_marks','negative_marks_on','exam_time','is_active','is_deleted','company_id'];
}

