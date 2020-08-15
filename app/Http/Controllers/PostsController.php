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
        ->simplePaginate(1);
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
        // $request->validate([
        //     'title' => 'required|max:20',
        //     'content' => 'required|max:255',
        //     // 'image' => 'required|file|image,
        // ]);
        
        // $post = new Post();
        // $image = $request->file('image');
        // $path = Storage::disk('s3')->put('travenirs', $image, 'public');
        // $post->image = Storage::url($path);

        // $request->user()->posts()->create([
        //     'user_id' => $request->user_id,
        //     'image' => $request->image,
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'tag' => $request->tag,
        // ]);
        
        // return redirect('posts.index');
        
        $this->validate($request, [
           'image' => 'image|max:1999',
           'title' => 'required',
           'content' => 'required|max:255',
        ]);
        
        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->image = $fileNameToStore;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->tag = $request->input('tag');
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
        $post = Post::findOrFail($id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        // idの値でメッセージを検索して取得
        $post = Post::findOrFail($id);
        // メッセージを更新
        $post->image = $request->image;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->tag = $request->tag;
        $post->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/');
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
