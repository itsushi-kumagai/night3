<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function show($id,User $user)
    {   
        $user = User::find($id);
        $user->profile;
        return view('profile.user')->with('user', $user)->with('profile', Profile::all());
    }

    public function showImage($filename)
    {
        $path = public_path("/uploads/$filename");
        //$path = public_path("uploads/{$filename}");

        if (!\File::exists($path)) {
            return response()->json(['message' => 'Image not found.'], 404);
        }

        $file = \File::get($path);
        $type = \File::mimeType($path);

        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
