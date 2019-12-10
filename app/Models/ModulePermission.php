<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModulePermission extends Model
{
    protected $table = "module_permissions";
    protected $primaryKey = "id";
    
    protected $fillable = ['user_module_id','is_create','is_read','is_write'];
}
?>