<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliderHead="Photo sell for Photographer";
        $sliderText="Lorem ipsum";
        $randomImages = Photo::with('user')->inRandomOrder()->paginate(20);
        return view('home',compact(['sliderHead','sliderText','randomImages']));
    }

    public function redirectUser(){
        return to_route('home');
    }
}
