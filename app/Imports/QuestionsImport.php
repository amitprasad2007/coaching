<?php

namespace App\Imports;
use Auth;
use App\Models\Topicquestions;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
         $company_id = Auth::guard()->user()->id;
        return new Topicquestions([
            'topic_id'  => $row['topic_id'],
            'question' =>$row['question'], 
            'option_a' => $row['option_a'],
            'option_b' => $row['option_b'], 
            'option_c' => $row['option_c'],
            'option_c' => $row['option_c'], 
            'option_d' => $row['option_d'], 
            'right_option' => $row['right_option'], 
            'is_active' => $row['is_active'],
            'is_deleted' => $row['is_deleted'],
            'company_id'=> $company_id, 
        ]);
    }
}
