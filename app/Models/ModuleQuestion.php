<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleQuestion extends Model
{
    protected $table = "module_questions";
    protected $primaryKey = "id";
    
    protected $fillable = ['module_id','question_id','is_active','is_deleted','company_id'];
}
