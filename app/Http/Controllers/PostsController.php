<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;



class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::latest()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *a
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        //upload the image to strage
        //dd($request->image->store('posts'));
        $image = $request->image->store('posts');

        //create the posts
        $post = Post::create([
            'image' => $image,
            'category_id' => $request->category,
            'title' => $request->title,
            'place' => $request->place,
            'map' => $request->map,
            'date' => $request->date,
            'organizer' => $request->organizer,
            'organizer_link' => $request->organizer_link,
            'published_at' => $request->published_at,
            'description' => $request->description
        ]);

        if($request->tags) {
            $post->tags()->attach($request->tags);
        }

        //flash message
        session()->flash('success', 'Post created successfully.');

        //resirect user
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'place', 'map', 'date', 'published_at', 'description', 'organizer', 'organizer_link' ]);

        //check if new image
        if($request->hasFile('image')){
            //upload it
            $image = $request->image->store('posts');
            //delete old image
            //$post->deleteImage();
            Storage::delete($post->image);

            $data['image'] = $image;
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        //update attributes

        $post->update($data);
    
        //flash message
        session()->flash('success', 'Post updated sucessfully.');

        //redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if($post->trashed()) {

            Storage::delete($post->image);

            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('success', 'Post deleted successfully.');

        return redirect(route('posts.index'));
    }



    /**
     * Destroy a list of all trashed posts
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->paginate(10);

        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        
        $post->restore();

        session()->flash('success', 'Post restore successfully.');

        return redirect()->back();
    }
}
