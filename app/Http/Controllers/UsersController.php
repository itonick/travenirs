<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            
            $data = [
                'user' => $user,
            ];
        }
        return view('users.index', $data);
    }
    
    
    public function show($id)
    {
        $user = User::findOrFail($id);

        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required|max:14',
           'email' => 'required|max:255',
           'password' => 'required|min:8|confirmed',
        ]);
        
        $user = User::findOrFail($id);
        $user->image = $request->image;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        // トップページへリダイレクトさせる
        return view('users.index', [
            'user' => $user,
        ]);
    }
    
    //ユーザのフォロー一覧ページを表示するアクション。
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    //ユーザのフォロワー一覧ページを表示するアクション。
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    public function favorites($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $favorites = $user->favorites()->paginate(10);
        
        return view('users.favorites', [
            'user' => $user,
            'posts' => $favorites,
        ]);
    }
    
    public function posts($id)
    {
        $user = user::findOrFail($id);
        $user->loadRelationshipCounts();
        $posts = $user->posts()->paginate(10);
        
        return view('users.posts', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function questions($id)
    {
        return view('users.questions');
    }
}
