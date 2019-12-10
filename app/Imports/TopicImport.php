<?php

namespace App\Imports;
use Auth;
use App\Models\Topic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class TopicImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $company_id = Auth::guard()->user()->id;
        return new Topic([
            'name'  => $row['name'],
            'subject_id' =>$row['subject_id'], 
            'is_active' => $row['is_active'], 
            'is_deleted' => $row['is_deleted'], 
           'company_id'=> $company_id, 
        ]);
    }
}
