<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Post $post)
    {
        $posts = Post::latest()
                ->orderBy('date', 'asc')
                ->limit(7)
                ->get();
        return view('/home', compact('posts'));
        
    }


    public function home(Post $post)
    {
        
        $posts = Post::latest()
                ->orderBy('date', 'asc')
                ->limit(7)
                ->get();
        return view('/welcome', compact('posts'));
    }

    public function verify()
    {
        return view('/verify');
    }
}
