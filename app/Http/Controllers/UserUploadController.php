<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserUploadController extends Controller
{
    public function upload(){
        return view('user.upload');
    }
    public function getUpload(Request $request){
        // check upload form validation
        $request->validate([
            'name' => 'required|max:55|unique:photos,name',
            'details' => 'required|max:200',
            'image' => 'required|image|max:2024|mimes:jpg,jpeg,png'
        ]);
        // make image name
        $imageName = uniqid().sha1(rand(100,900)).'.'.request()->file('image')->extension();
        // save & move image
        request()->file('image')->move('uploads/',$imageName);
        // get image data
        Photo::create([
            'user_id' => Auth::id(),
            'name' => request('name'),
            'details' => request('details'),
            'image' => $imageName
        ]);

        return back()->with('okMassage', 'Image upload successful');
    }
}
