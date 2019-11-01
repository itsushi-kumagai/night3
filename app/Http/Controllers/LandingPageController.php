<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class LandingPageController extends Controller
{
    public function index(Post $post)
    {
        $posts = Post::latest()
                ->orderBy('date', 'asc')
                ->limit(7)
                ->get();
        return view('/home', compact('posts'));
    }
}
