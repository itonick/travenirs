<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'category'];
    // この投稿を所有するユーザ。（ Userモデルとの関係を定義）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('answers');
    }
}
