<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Storage;

class PostsController extends Controller
{
    public function index()
    {
        $posts = new Post;
        $data['posts'] = Post::orderBy('created_at', 'desc')
        ->simplePaginate(5);
        
        return view('posts.index', $data);
    }

    public function create()
    {
        $post = new Post;

        return view('posts.create', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->tag = $request->input('tag');
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/images/', $filename);
            $post->image = $filename;
        } else {
            return $request;
            $post->image = '';
        }
        $post->save();

        return redirect('posts.index');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', [
            'post' => $post,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'title' => 'required',
           'content' => 'required|max:255',
           'tag' => 'required',
        ]);
        
        $post = Post::find($id);
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->tag = $request->tag;
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/images/', $filename);
            $post->image = $filename;
        }
        $post->save();
        return redirect('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return back();
    }
    
    public function search(Request $request)
    {
    	$posts = Post::orderBy('created_at', 'desc')->where('tag', 'like', "%{$request->search}%")->paginate(2);
    	$search_result = '「' . $request->search . '」' . 'の投稿：' . $posts->total() . '件';
    
    	return view('posts.index', [
    	    'posts' => $posts,
    	    'search_result' => $search_result,
    	]);
    }

}
