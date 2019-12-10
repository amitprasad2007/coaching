<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = "modules";
    protected $primaryKey = "id";
    
    protected $fillable = ['name','is_active','is_deleted'];
}

?>
