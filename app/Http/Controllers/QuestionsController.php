<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        
        return view('questions.index', [
            'questions' => $questions,
        ]);
    }

    public function create()
    {
        $question = new Question;
        
        return view('questions.create', [
            'question' => $question,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|max:25',
           'content' => 'required|max:255',
           'category' => 'required',
        ]);
        
        $question = new Question;
        $question->user_id = auth()->user()->id;
        $question->title = $request->input('title');
        $question->content = $request->input('content');
        $question->category = $request->input('category');
        $question->save();

        return redirect('questions.index');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        // dd($question);
        $answers = $question->answers()->orderBy('created_at', 'desc')->paginate(10);
        // dd($answers);

        return view('questions.show', [
            'question' => $question,
            'answers' => $answers,
        ]);
    }

//     public function answer(Request $request){

// 		$question = new Question;
// 		$question->answer = $request->input('answer');
		
		

// 		return redirect()->action("QuestionsController@confirm");
// 	}
    
//     public function confirm(Request $request){
// 		//セッションから値を取り出す
// 		$input = $request->session()->get("form_input");
		
// 		if($request->has("back")){
// 			return redirect()->action("QuestionsController@show")
// 				->withInput($input);
// 		}
		
// 		//セッションに値が無い時はフォームに戻る
// 		if(!$input){
// 			return redirect()->action("QuestionsController@show");
// 		}
// 		return view("answers.confirm",["question" => $question]);
// 	}
    
    public function destroy($id)
    {
        //
    }
    
    public function search(Request $request)
    {
    	$questions = Question::orderBy('created_at', 'desc')->where('title', 'like', "%{$request->search}%")
    	                                                    ->orWhere('category', 'like', "%{$request->search}%")
    	                                                    ->orWhere('content', 'like', "%{$request->search}%")->paginate(10);
    	$search_result = '「' . $request->search . '」' . 'の投稿：' . $questions->total() . '件';
    
    	return view('questions.index', [
    	    
    	    'questions' => $questions,
    	    'search_result' => $search_result,
    	]);
    }
    
    public function answers($id)
    {
        $question = Question::findOrFail($id);

        $question->loadRelationshipCounts();
        dd($question);

        return view('questions.index', [
            'question' => $question,
        ]);
    }
}
