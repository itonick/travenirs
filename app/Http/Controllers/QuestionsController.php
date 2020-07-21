<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;

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
        $question = new Question;
        $question->content = $request->content;
        $question->save();

        return redirect('/');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.show', [
            'question' => $question,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
