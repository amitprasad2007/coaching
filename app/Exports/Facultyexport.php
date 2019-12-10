<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;
use DB;
use App\Models\Faculty;

class Facultyexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Faculty::where('tbl_faculties.is_deleted','=',0)
       				        ->get();
    }
}
