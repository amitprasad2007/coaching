<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = "topics";
    protected $primaryKey = "id";
    
    protected $fillable = ['name','subject_id','is_active','is_deleted','company_id'];
}
?>