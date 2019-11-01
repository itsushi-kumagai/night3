<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\Profile;


class ResultsController extends Controller
{
    public function index(Request $request)
    {
    if ($request->has('description')){
            $description = $request->input('description');
            $category_id = $request->input('category_id');
            $date = $request->input('date');
            $query = Post::query();
            foreach ($request->only(['description', 'category_id','date']) as $key => $value) {
                $query->where($key, 'like', '%'.$value.'%');
            }
            $posts = $query->paginate(10);
        }
            
        else {
            $posts = Post::latest()
                ->orderBy('date', 'asc')
                ->paginate(10);
        }

        return view('posts.result', compact('posts'));
    }

    public function show(Post $post)
    {
        $recommended_posts = Post::latest()
                            ->whereDate('date','>',date('Y-m-d'))
                            ->where('category_id','=',$post->category_id)
                            ->where('id','!=',$post->id)
                            ->limit(7)
                            ->get();

       
        $posts['particular_post'] = $post;
        $posts['recommended_posts'] = $recommended_posts;

        return view('posts.show',compact('posts'));
    }

    public function search(Request $request)
    {
    if ($request->has('description')){
            $description = $request->input('description');
            $category_id = $request->input('category_id');
            $date = $request->input('date');
            $query = Post::query();
            foreach ($request->only(['description', 'category_id','date']) as $key => $value) {
                $query->where($key, 'like', '%'.$value.'%');
            }
            $posts = $query->paginate(10);
        }
            
        else {
            $posts = Post::latest()
                ->orderBy('date', 'asc')
                ->paginate(10);
        }

        return view('admin', compact('posts'));
    }

    // public function UserSearch(Request $request)
    // {
    // if ($request->has('description')){
    //         $description = $request->input('description');
    //         $gender = $request->input('gender');
    //         $country = $request->input('country');
    //         $query = Profile::query();
    //         foreach ($request->only(['description', 'gender','country']) as $key => $value) {
    //             $query->where($key, 'like', '%'.$value.'%');
    //         }
            
    //         $profile = $query->paginate(10);
    //     }
            
    //     else {
    //         $profile = Profile::latest()
    //             ->orderBy('date', 'asc')
    //             ->paginate(10);
    //     }

    //     return view('admin/user', compact('posts'));
    // }

}
