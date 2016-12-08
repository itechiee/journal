<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Session;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $users = User::paginate(25);
        $users = User::with('roles')->paginate(25);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $requestData['password'] = Hash::make($requestData['password']);
        User::create($requestData);

        Session::flash('flash_message', 'User added!');

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $user = User::findOrFail($id);
        
        if(!empty($requestData['edit_password'])) {
            $requestData['password'] = Hash::make($requestData['edit_password']);
        }
        $user->update($requestData);

        Session::flash('flash_message', 'User updated!');

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('users');
    }

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
}
