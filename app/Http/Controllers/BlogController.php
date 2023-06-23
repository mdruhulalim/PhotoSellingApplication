<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $sliderHead="Welcome Blog page";
        $sliderText="this is the dummy text of blog page slider";
        return view('blog',compact(['sliderHead','sliderText']));
    }
}
