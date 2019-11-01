<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
   public function __construct() 
   {
        $this->middleware('user');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->favourites;
        return view('profile.index')->with('profile', Profile::all())->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user_id = auth()->user()->id;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/', $filename);
            Profile::updateOrCreate(
                ['user_id' => $user_id], // search requirements
                [   
                    'image'=>$filename
                ]
            );
        }

        // Get current image of user, then delete it
       


        //Then update profile imageture column in database
        // DB::table('profiles')->where('id',$user_id)->update(['image' =>$filename]);

     
        // $image_path = "uploads/profile/$filename";  // Value is not URL but directory file path
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }
        
        $this->validate($request,[
            'bod'=>'date_format:Y-m-d|before:today|after:1920-01-01|sometimes|nullable'
        ]);
        
        Profile::updateOrCreate(
            ['user_id' => $user_id], // search requirements
            [   
                'gender' => request('gender'),
                'country' => request('country'),
                'bod' => request('bod'),
                'instagram' => request('instagram'),
                'description' => request('description'),
            ]
        );
        
        return redirect()->route('profile.index')
        ->with('message', 'Please verify your email by clicking the link sent to your email address.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request) {

        
        return redirect()->back();
    }


        
}
