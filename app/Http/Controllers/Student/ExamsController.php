<?php

namespace App\Http\Controllers\Student;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use DB;


class ExamsController extends Controller
{
    public function index() {
	// get all modules
        $exams = DB::table('subject_modules')
                ->join('subjects', 'subjects.id', '=', 'subject_modules.subject_id')
                ->select('subject_modules.*', 'subjects.name as subject_name')
                ->where('subject_modules.is_deleted', '=', 0)
                ->get();
        return view('students.exams.index', compact('exams'));
    }
	
	public function give($id){
		// validate the question paper / module 
		$module = DB::table('subject_modules')
                ->join('subjects', 'subjects.id', '=', 'subject_modules.subject_id')
                ->select('subject_modules.*', 'subjects.name as subject_name')
                ->where(array(array('subject_modules.id', '=', $id),array('subject_modules.is_deleted', '=', 0)))
                ->get();
		if(empty($module)){
			// need to redirect to the url or die
			die("Invalid Link");
		}	
		
		$module= $module[0];
		$subject_id = $module->subject_id;
		

		// get all the questions from this question paper
		$select_flds = array('module_questions.id','module_questions.module_id','module_questions.question_id',
			'topic_questions.topic_id','topic_questions.question',
			'topic_questions.option_a','topic_questions.option_b','topic_questions.option_c','topic_questions.option_d',
			'topic_questions.right_option'
		);
		$questions=DB::table('module_questions')
                ->join('topic_questions', 'topic_questions.id', '=', 'module_questions.question_id')
                ->select($select_flds)
                ->where(array(array('module_questions.module_id', '=', $id),array('module_questions.is_deleted', '=', 0)))
				->orderBy('topic_questions.topic_id','ASC')
                ->get();
		//$questions = json_encode($questions);
		// get all related topic of this
		$topics = DB::table('topics')
                ->select('topics.*')
                ->where(array(array('topics.subject_id', '=', $subject_id),array('topics.is_deleted', '=', 0),))
                ->get();
		
		return view('students.exams.give',compact('module','topics','questions'));
	}

    public function instruction($id){
		return view('students.exams.instruction',compact('id'));
	}
	public function summary($id){
		// validate the question paper / module 
		$module = DB::table('subject_modules')
                ->join('subjects', 'subjects.id', '=', 'subject_modules.subject_id')
                ->select('subject_modules.*', 'subjects.name as subject_name')
                ->where(array(array('subject_modules.id', '=', $id),array('subject_modules.is_deleted', '=', 0)))
                ->get();
		if(empty($module)){
			// need to redirect to the url or die
			die("Invalid Link");
		}
		else{
			$module = $module[0];
		}
		return view('students.exams.summary',compact('id','module'));
	}
	
	public function submit($id){
		// validate the question paper / module 
		$module = DB::table('subject_modules')
                ->join('subjects', 'subjects.id', '=', 'subject_modules.subject_id')
                ->select('subject_modules.*', 'subjects.name as subject_name')
                ->where(array(array('subject_modules.id', '=', $id),array('subject_modules.is_deleted', '=', 0)))
                ->get();
		if(empty($module)){
			// need to redirect to the url or die
			die("Invalid Link");
		}
		else{
			$module = $module[0];
		}
		
		$time_taken = isset($_POST['time_taken'])?$_POST['time_taken']:0;
		$total_question = 0;
		$total_right_ans=0;
		$total_wrong_ans=0;
		$total_not_attempt=0;
		$question_setting_error=0;
		$each_question_mark=1;
		$total_marks_obtain=0;
		//module details
		$subject_module_id=$module->id;
		$exam_name=$module->name;
		$total_marks=$module->total_marks;
		$pass_marks=$module->pass_marks;
		$negative_marks_on=$module->negative_marks_on;// question
		$exam_time =$module->exam_time; //minutes
		$subject_id = $module->subject_id;
		$subject_name = $module->subject_name;
		$questions=array();
		if(isset($_POST['questions'])){
			$questions = json_decode($_POST['questions']);
		}
		
		if(!empty($questions)){
			if(is_array($questions)){
				foreach($questions as $key=>$question){
					$right_option = isset($question->right_option)?$question->right_option:'';
					$right_option = preg_replace('/[^abcd]/','',$right_option);
					$given_ans = isset($question->given_ans)?$question->given_ans:'';
					$question->right_option = $right_option;
					
					if(!empty($right_option)){
						if(!empty($given_ans)){
							if(strtolower($given_ans)==strtolower($right_option)){
								$total_right_ans++;
							}
							else{
								$total_wrong_ans++;
							}
						}
						else{
							$total_not_attempt++;
						}
					}
					else{
						$question_setting_error++;
					}
				}
				$total_question =count($questions);
			}
		}
		
		// calculate the summery of exam
		$negative_mark=0;
		if($negative_marks_on>0){
			$negative_mark = floor(($each_question_mark*$total_wrong_ans)/$negative_marks_on);
		}
		$total_marks_obtain = ($total_right_ans*$each_question_mark)-($negative_mark);
		$user_id = Auth::guard()->user()->id;

		$save_data=array(
			'user_id'=>$user_id, //student id
			'company_id'=>$user_id,
			'subject_module_id'=>$subject_module_id,
			'exam_name'=>$exam_name,
			'subject_name'=>$subject_name,
			'exam_time'=>$exam_time,
			'total_marks'=>$total_marks,
			'pass_marks'=>$pass_marks,
			'negative_marks_on'=>$negative_marks_on,
			'total_question'=>$total_question,
			'time_taken'=>$time_taken,
			'each_question_mark'=>$each_question_mark,
			'total_right_ans'=>$total_right_ans,
			'total_wrong_ans'=>$total_wrong_ans,
			'total_not_attempt'=>$total_not_attempt,
			'question_setting_error'=>$question_setting_error,
			'negative_mark'=>$negative_mark,
			'total_marks_obtain'=>$total_marks_obtain,
			'user_ans'=>json_encode($questions),
			'created_at'=>date("Y-m-d H:i:s"),
			'updated_at'=>date("Y-m-d H:i:s"),
		);
		DB::table("user_exams")->insertGetId($save_data);
		return redirect('student/exams/complete');
	}
	public function complete(){
		return view('students.exams.save');
	}
	
	public function attempted(){
		$user_id = Auth::guard()->user()->id;
		// validate the question paper / module 
		$exams = DB::table('user_exams')
			->where(array(array('user_id', '=', $user_id),array('is_deleted', '=', 0)))
			->orderBy('exam_id','desc')
			->get();
		return view('students.exams.attempt',compact('exams'));
	}
	
	public function details($exam_id=0){
		$user_id = Auth::guard()->user()->id;
		// validate the question paper / module 
		$exams = DB::table('user_exams')
			->where(array(array('user_id', '=', $user_id),array('exam_id', '=', $exam_id),array('is_deleted', '=', 0)))
			->get();
		$exam = $exams[0];
		$questions = (!empty($exam->user_ans))?json_decode($exam->user_ans):array();
		return view('students.exams.details',compact('exam','questions'));
	}


}
