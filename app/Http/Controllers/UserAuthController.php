<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // for register
    public function showRegister(){
        return view('user.register');
    }
    public function getRegister(Request $request){
        // check register form validation
        $request->validate([
            'name' => 'required|max:55',
            'uname' => 'required|max:55|alpha_dash|unique:users,user_name',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|max:150|alpha_dash|confirmed',
        ],
        [
            'uname.required' => 'The user name field is required',
            'uname.alpha_dash' => 'The user name field must only contain letters, numbers, dashes, and underscores.',
            'uname.unique' => 'The user name has already been taken.',
        ]
        );

        // insert the user ta and financial
        User::create([
            'user_name' => request('uname'),
            'full_name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ])->financial()->create();

        return to_route('user.login.show')->with('okMassage', 'Register success! Login now');
    }

    // for login
    public function showLogin(){
        return view('user.login');
    }
    public function login(Request $request){
        // check login form validation
        $request->validate([
            'uname' => 'required|max:55|alpha_dash',
            'password' => 'required|max:150',
        ],
        [
            'uname.required' => 'The user name field is required',
            'uname.alpha_dash' => 'The user name field must only contain letters, numbers, dashes, and underscores.',
        ]);

        // user login
        if(Auth::attempt([
            'user_name' => request('uname'),
            'password' => request('password'),
        ])){
            return to_route('home');
        }else{
            return redirect()->back()->with('errorMassage', "Retry, brave soul! Login denied, but hope's not lost. Give it another shot and conquer the login realm!");
        };
    }
    public function logout(){
        Auth::logout();
        return to_route('home');
    }
}
