<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Models\Topicquestions;
use App\Models\Topic;
use App\Imports\QuestionsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QuestionsExport;

class QuestionsController extends Controller
{
    
    public function index(Request $request)
    {
        $questions = DB::table('topic_questions')
                     ->join('topics', 'topics.id', '=', 'topic_questions.topic_id')
                     ->select('topic_questions.*', 'topics.name as topic_name')
                     ->where('topic_questions.is_deleted','=',0)
                     ->get();
                     return view('admin.views.Questions.questions',compact('questions') );
    }
    public function index11(Request $request)
    {if ($request->ajax()) {
        $questions = DB::table('topic_questions')
                     ->join('topics', 'topics.id', '=', 'topic_questions.topic_id')
                     ->select('topic_questions.*', 'topics.name as topic_name')
                     ->where('topic_questions.is_deleted','=',0)
                     ->get();
                     return Datatables::of($questions)
              
                    ->make(true);}


        return view('admin.views.Questions.questions', );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id = Auth::guard()->user()->id;

        $topics = DB::table('topics')->where('is_deleted', '=', 0)->where('company_id', '=', $company_id)->get();
        $datas['topics'] = $topics;
      
       return view( 'admin.views.Questions.add_questions', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $company_id = Auth::guard()->user()->id;
       $topicquestions = new Topicquestions;
            $topicquestions->company_id=$company_id;
            $topicquestions->topic_id  = $request->topic_id;
            $topicquestions->question = $request->question;
            $topicquestions->option_a = $request->option_a;
            $topicquestions->option_b = $request->option_b;
            $topicquestions->option_c = $request->option_c;
            $topicquestions->option_d = $request->option_d;
            $topicquestions->right_option = $request->right_option;
            $topicquestions->save();
            
            $request->session()->flash("message","Student has been created successfully");
          return redirect('questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function export_question_data($id){
       return Excel::download(new QuestionsExport, 'sample.csv');
    }



public function import_question() {
        $company_id = Auth::guard()->user()->id;

        $topics = Topic::where('is_deleted', '=', 0)->where('company_id', '=', $company_id)->get();
        $datas['topics'] = $topics;
        return view('admin.views.Questions.import_question', compact('datas'));
}

public function import_store(Request $request) {

    Excel::import(new TopicImport,request()->file('image'));
    return back();

}

}
