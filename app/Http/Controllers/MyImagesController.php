<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyImagesController extends Controller
{
    public function allImages(){
        // $userImages = Auth::user()->photos;
        $userImages = Photo::where('user_id',Auth::id())->paginate(8);
        return view('user.myimages', compact('userImages'));
    }

    // sendForSale request
    public function sendForSale($imageID){
        $image = Photo::findOrFail($imageID);
        if($image->user_id == Auth::id() && $image->status == 'approved'){
            $image->update([
                'status' => 'selling',
            ]);
            return redirect()->back();
        }else{
            return 'Hacker founded';
        }
    }
}
