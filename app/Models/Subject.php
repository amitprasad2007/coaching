<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $primaryKey = "id";
    
    protected $fillable = ['name','code','category_id','is_active','is_deleted','company_id'];
}

?>