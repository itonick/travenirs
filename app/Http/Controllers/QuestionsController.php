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
        $answers = $question->answers()->orderBy('created_at', 'desc')->paginate(10);

        return view('questions.show', [
            'question' => $question,
            'answers' => $answers,
        ]);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return back();
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

        return view('questions.index', [
            'question' => $question,
        ]);
    }
}
