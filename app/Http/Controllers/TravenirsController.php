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
        $posts = Post::inRandomOrder()->take(1)->get();

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
}
