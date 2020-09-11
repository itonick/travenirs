<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Travenir;
use App\Post;
use App\User;

class TravenirsController extends Controller
{

    public function index()
    {
        $posts = Post::all()->random(1)->all();
        $user = User::all();

        return view('travenirs.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $travenir = new Travenir;
        
        return view('travenirs.create', [
            'travenirs' => $travenir,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $request->user()->travenirs()->create([
            'content' => $request->content,
        ]);

        return back();
    }

    public function show($id)
    {
        //
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
