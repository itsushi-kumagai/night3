<?php

namespace App\Http\Controllers\Auth;

use App\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminRegisterController extends Controller
{

    use RegistersUsers;

   protected $redirectTo = '/admin';

   public function __construct(){
        $this->middleware('guest:admin');
    }

   public function showRegisterForm()
   {
       return view('auth.admin-register');
   }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
       return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function guard()
    {
        return \Auth::guard('admin');
    }

}