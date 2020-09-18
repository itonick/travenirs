<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Image;

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
    
    public function update(Request $request)
    {
        $request->validate([
           'name' => 'required|max:14',
           'email' => 'required|max:255',
           'password' => 'required|min:8|confirmed',
        ]);
        
        $user = Auth::user();
        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/images', $image_new_name);
            $user->image = 'uploads/images/'. $image_new_name;
            $user->save();
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect('users.index');
    }
    
    //ユーザのフォロー一覧ページを表示するアクション。
    public function followings($id)
    {
        $user = User::findOrFail($id);

        $user->loadRelationshipCounts();

        $followings = $user->followings()->paginate(10);

        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    //ユーザのフォロワー一覧ページを表示するアクション。
    public function followers($id)
    {
        $user = User::findOrFail($id);

        $user->loadRelationshipCounts();

        $followers = $user->followers()->paginate(10);

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
    
    public function posts(Request $request, $id)
    {
        $user = user::findOrFail($id);
        $user->loadRelationshipCounts();
        $posts = $user->posts()->paginate(9);
        
        return view('users.posts', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function questions($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $questions = $user->questions()->paginate(10);
        
        return view('users.questions', [
            'user' => $user,
            'questions' => $questions,
        ]);
    }
}
