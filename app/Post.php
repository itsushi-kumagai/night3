<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    

    use SoftDeletes;
    
    protected $fillable = [
        'image', 'category_id',  'title', 'place', 'map', 'date','organizer', 'organizer_link', 'published_at', 'description'
    ];

    /**
     * Delete post image from storage
     * 
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class);
    }

    public function favourites(){
        return $this->belongsToMany(User::class,'favourites','post_id','user_id')->withTimeStamps();
    }

    public function checkSaved(){
        return \DB::table('favourites')->where('user_id',auth()->user()->id)->where('post_id',$this->id)->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('comment_id')->orderBy('created_at', 'DESC');
    }

    /**
     * check if post has array
     * 
     * @return boot
     * 
     */

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }


   
}
