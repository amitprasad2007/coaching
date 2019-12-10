<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Topicquestions;
use App\Models\Topic;

class QuestionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Topicquestions::where('topic_questions.is_deleted','=',0)
       				 ->join('topics', 'topics.id', '=', 'topic_questions.topic_id')
                     ->select('topic_questions.*', 'topics.name as topic_name')
                     ->where('topic_questions.is_active',1)
                     ->get();
    }
}
