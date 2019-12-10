<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\User;


class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return User::where('is_deleted',0)
       				->where('is_active',1)
       				->where('role',2)	
                    ->get();
    }
}
