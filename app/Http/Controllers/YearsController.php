<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Year;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\YearRequest;

class YearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $years = Year::paginate(25);

        return view('years.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('years.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(YearRequest $request)
    {
        
        $requestData = $request->all();
        
        Year::create($requestData);

        Session::flash('flash_message', 'Year added!');

        return redirect('years');
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
        $year = Year::findOrFail($id);

        return view('years.show', compact('year'));
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
        $year = Year::findOrFail($id);

        return view('years.edit', compact('year'));
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
        
        $year = Year::findOrFail($id);
        $year->update($requestData);

        Session::flash('flash_message', 'Year updated!');

        return redirect('years');
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
        Year::destroy($id);

        Session::flash('flash_message', 'Year deleted!');

        return redirect('years');
    }
}
