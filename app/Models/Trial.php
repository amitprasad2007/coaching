<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    protected $table = "trials";
    protected $primaryKey = "id";
    
    protected $fillable = ['name','email','mobile','company_name','website_url','is_active','is_deleted','otp','is_verified'];
}

?>
