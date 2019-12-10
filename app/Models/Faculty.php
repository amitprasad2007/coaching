<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Faculty extends Authenticatable
{ use Notifiable,HasRoles;

    protected $table="tbl_faculties";
    protected $primaryKey = "id";
    
    protected $fillable = ['faculty_type_id','name','email','designation','phone_no','password', 
     'gender_id','profile_photo','address'];
                            
    protected $hidden = [
  'password', 'remember_token',];
}
