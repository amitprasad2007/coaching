<?php

namespace App\Imports;
use Auth;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { $company_id = Auth::guard()->user()->id;
        return new User([
            'name'  => $row['name'],
            'dob' =>$row['dob'], 
            'email' => $row['email'], 
            'phone_number'  =>$row['phone_number'], 
            'alternate_phone_number'  => $row['alternate_phone_number'], 
            'password' => bcrypt($row['password']),
            'address'  => $row['address'], 
            'city' => $row['city'], 
            'state' => $row['state'], 
            'country'=> $row['country'], 
            'role'  => $row['role'], 
            'is_active' => $row['is_active'], 
           'company_id'=> $company_id, 
        ]);
    }
}
