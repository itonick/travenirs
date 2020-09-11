<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'image', 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('posts', 'followings', 'followers', 'favorites');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            return false;
        } else {
            $this->followings()->attach($userId);
            return true;
        }
    }

    public function unfollow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }

    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    //このユーザとフォロー中ユーザの投稿に絞り込む。
    public function feed_posts()
    {
        // このユーザがフォロー中のユーザのidを取得して配列にする
        $userIds = $this->followings()->pluck('users.id')->toArray();
        // このユーザのidもその配列に追加
        $userIds[] = $this->id;
        // それらのユーザが所有する投稿に絞り込む
        return Post::whereIn('user_id', $userIds);
    }
    
    public function favorite($postId)
    {
        $exist = $this->is_favorite($postId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($postId);
            return true;
        }
    }
    
    public function unfavorite($postId)
    {
        $exist = $this->is_favorite($postId);

        if($exist){
            $this->favorites()->detach($postId);
            return true;
        }else{
            return false;
        }
    }
    
    public function is_favorite($postId)
    {
        return $this->favorites()->where('post_id', $postId)->exists();
    }
    
    public function updateProfile(Array $params)
    {
        if (isset($params['image'])) {
            $file_name = $params['image']->store('public/image/');

            $this::where('id', $this->id)
                ->update([
                    'password'   => $params['password'],
                    'name'          => $params['name'],
                    'image' => basename($file_name),
                    'email'         => $params['email'],
                ]);
        } else {
            $this::where('id', $this->id)
                ->update([
                    'password'   => $params['password'],
                    'name'          => $params['name'],
                    'email'         => $params['email'],
                ]); 
        }

        return;
    }
}
