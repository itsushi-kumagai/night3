<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class UserAdminController extends Controller
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
    public function index(User $user)
    {
        $user->profile;
        return view('user.dashboard')->with('users', User::latest()->paginate(10))
                                    ->with('profiles', Profile::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   
        $user->profile;
        return view('user.info')->with('user', $user)->with('profile', Profile::all());
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::withTrashed()->where('id', $id)->firstOrFail();

        if($user->trashed()) {

            

            $user->forceDelete();
        } else {
            $user->delete();
        }

        session()->flash('success', 'User deleted successfully');
        return redirect('admin/user');
    }

    public function banned()
    {
        $banned = User::onlyTrashed()->paginate(10);
        return view('user.dashboard')->with('users', $banned);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->firstOrFail();
        
        $user->restore();

        session()->flash('success', 'Post restore successfully.');

        return redirect()->back();
    }
}
