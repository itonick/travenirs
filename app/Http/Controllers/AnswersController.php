<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Auth;

class AnswersController extends Controller
{
    public function confirm(Request $request)
    {
        $request->validate([
            'answer' => 'required|max:255',
        ]);
        
        // $question = Question::where('id', $request->input('question_id'))->get();
        // dd($question);
        
        $input = \Request::all();
        Answer::create($input);
        // dd($input);
        
        $answer = [
            'question_id' => $request->question_id,
            'answer' => $request->answer,
        ];
        // dd($answer);

        $question = [
            'answer'=>$request->answer,
        ];

        return view('answers.confirm', $answer);
    }
    
    public function complete(Request $request)
    {
        return view('answers.complete');
    }
}
