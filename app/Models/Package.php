<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "packages";
    protected $primaryKey = "id";
    
    protected $fillable = ['name','subject_id','price','overview','benifit','no_of_papers',
        'validity','is_active','is_deleted'];
}
