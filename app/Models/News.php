<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "id";
    
    protected $fillable = ['news','link','is_active','is_deleted','company_id'];
}
