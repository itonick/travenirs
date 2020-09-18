<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['image', 'title', 'tag', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
