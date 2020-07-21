<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Travenir;

class TravenirsController extends Controller
{

    public function index()
    {
        return view('travenirs.index');
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
