<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    

    protected $with = ['user'];

    protected $appends = ['repliesCount'];

    protected $fillable = [
        'body', 'post_id', 'comment_id',
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getRepliesCountAttribute()
    {
        return $this->replies->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_id')->whereNotNull('comment_id');
    }

    
}
