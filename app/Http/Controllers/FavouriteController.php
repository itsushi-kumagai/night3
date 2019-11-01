<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class FavouriteController extends Controller
{
    public function savePost($id){
        $postId = Post::find($id);
        $postId->favourites()->attach(auth()->user()->id);//情報を入れる
        return redirect()->back();
    }

    public function unSavePost($id){
        $postId = Post::find($id);
        $postId->favourites()->detach(auth()->user()->id);//情報をデリートする
        return redirect()->back();
    }
}
