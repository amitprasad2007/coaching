<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
class Facultyimport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
         $company_id = Auth::guard()->user()->id;
        return new Faculty([
            'faculty_type_id'  => $row['faculty_type_id'],
            'name' =>$row['name'], 
            'email' => $row['email'], 
            'designation' => $row['designation'], 
           'phone_no'=> $row['phone_no'], 
           'gender_id'=> $row['gender_id'], 
           'profile_photo'=> $row['profile_photo'], 
           'address'=> $row['address'], 
        ]);
    }
}
