<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Version;

class HomeController extends Controller
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
    public function index()
    {
        $filesData = Version:: get(['id', 'title', 'file_path'])->toArray();

        // return view('home.index');
        return \View::make("home.index", compact('filesData'));
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
    public function register()
	{
		return view('auth.register');
	}
}
