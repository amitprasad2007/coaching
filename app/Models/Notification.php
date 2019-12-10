<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";
    protected $primaryKey = "id";
    
    protected $fillable = ['title','message','is_deleted','company_id'];
}
