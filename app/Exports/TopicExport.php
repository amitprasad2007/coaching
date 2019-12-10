<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;
use DB;

class TopicExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $company_id = Auth::guard()->user()->id;

     return $topics = DB::table('topics')
                ->join('subjects', 'subjects.id', '=', 'topics.subject_id')
                ->select('topics.*', 'subjects.name as subject_name')
                ->where('topics.is_deleted', '=', 0)
                ->where('topics.company_id', '=', $company_id)
                ->get();
    }
}
