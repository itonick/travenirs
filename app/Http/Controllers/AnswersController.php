<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use App\User;
use Auth;

class AnswersController extends Controller
{
    public function confirm(Request $request)
    {
        $request->validate([
            'answer' => 'required|max:255',
        ]);
        
        $input = \Request::all();
        Answer::create($input);

        $answer = [
            'question_id' => $request->question_id,
            'answer' => $request->answer,
        ];

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
