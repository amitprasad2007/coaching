<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topicquestions extends Model
{
    protected $table = "topic_questions";
    protected $primaryKey = "id";
    
    protected $fillable = ['question','topic_id','option_a','option_b','option_c','option_d',
        'right_option','is_active','is_deleted','company_id'];
}
