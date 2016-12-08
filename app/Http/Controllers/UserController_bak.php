<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('home.index');
    }

    public function about_us()
    {
        return view('home.about_us');
    }

    public function projects()
    {
        return view('home.projects');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function login(Request $request)
    {
        $data = $request->all();
        if(!isset($data['remember']))
            $data['remember'] = 0;
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'active' => 1], $data['remember'])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        return redirect()->intended('/');
    }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/');
    // }
    
}
