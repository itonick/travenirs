<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        // メッセージ一覧ビューでそれを表示
        return view('posts.index', [
            'posts' => $posts,
        ]);
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
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        $request->user()->posts()->create([
            'title' => $request->title,
            'tag' => $request->tag,
            'content' => $request->content,
        ]);
        
        $disk = Storage::disk('s3');
        $images = $request->file('item_url');
        foreach ( $images as $image) {
            $path = $disk->putFile('itemImages', $image, 'public');
            $url[] = $disk->url($path);
        }

        return view('posts.index');
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
}
