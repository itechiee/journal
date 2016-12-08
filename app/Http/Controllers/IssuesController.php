<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Issue;
use App\Year;
use Illuminate\Http\Request;
use Session;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $issues = Issue::paginate(25);

        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $yearlist = Year::pluck('years', 'id')->toArray();
        return view('issues.create', compact('yearlist'));
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
        
        Issue::create($requestData);

        Session::flash('flash_message', 'Issue added!');

        return redirect('issues');
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
        $issue = Issue::findOrFail($id);

        return view('issues.show', compact('issue'));
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
        $issue = Issue::findOrFail($id);
        $yearlist = Year::pluck('years', 'id')->toArray();
        return view('issues.edit', compact('issue', 'yearlist'));
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
        
        $issue = Issue::findOrFail($id);
        $issue->update($requestData);

        Session::flash('flash_message', 'Issue updated!');

        return redirect('issues');
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
        Issue::destroy($id);

        Session::flash('flash_message', 'Issue deleted!');

        return redirect('issues');
    }

    public function getIssuesList($yearId)
    {
        $issuesList = Issue::Where('year_id', $yearId)->pluck('issues', 'id')->toArray();
        return $issuesList;
    }
}
