<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freedemo extends Model
{
    protected $table = "demo_enquiries";
    protected $primaryKey = "id";
    
    protected $fillable = ['name','email','organization','phone','job_title','no_of_tests','website_url','message','is_active','is_deleted'];
}

?>
