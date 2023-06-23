<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliderHead="Welcome home";
        $sliderText="this is te dummy text of slider home page";
        return view('home',compact(['sliderHead','sliderText']));
    }

    public function redirectUser(){
        return to_route('home');
    }
}
