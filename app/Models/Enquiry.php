<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = "enquiries";
    protected $primaryKey = "id";
    
    protected $fillable = ['name','email','phone','company_name','message','is_active','is_deleted'];
}

?>
