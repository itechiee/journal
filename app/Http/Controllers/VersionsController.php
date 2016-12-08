<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Version;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\VersionRequest;
use Auth;
use App\Issue;
use App\Year;
use App\IssueVersion;

class VersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $versions = Version::paginate(25);

        return view('versions.index', compact('versions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $yearId = $issueId = $issuelist = [];
        $yearlist = Year::pluck('years', 'id')->toArray();
        return view('versions.create', compact('yearlist', 'yearId', 'issueId', 'issuelist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(VersionRequest $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('file_path')) {
            $uploadPath = public_path('/uploads/');

            $extension = $request->file('file_path')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $request->file('file_path')->move($uploadPath, $fileName);
            $requestData['file_path'] = $fileName;

            $fileType = 'pdf';
            if($extension != 'pdf')
                $fileType = 'doc';
        }
        $requestData['file_type'] = $fileType;
        $requestData['user_id'] = Auth::user()->id;

        $versions = Version::create($requestData);
        if($versions) {
            $requestData['version_id'] = $versions->id;
            IssueVersion::create($requestData);
        }

        Session::flash('flash_message', 'Version added!');

        return redirect('versions');
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
        $version = Version::findOrFail($id);

        return view('versions.show', compact('version'));
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
        $yearlist = Year::pluck('years', 'id')->toArray();
        $version = Version::with('issues_version')->findOrFail($id);
        $yearId = $issueId = $issuelist = [];

        if(isset($version->issues_version->issue_id)) {
            $issueId = $version->issues_version->issue_id; 
            if($version->issues_version->issues->years->id) {
                $yearId = $version->issues_version->issues->years->id;
                $issuelist = Issue::where('year_id', $yearId)->pluck('issues', 'id')->toArray();
            }

        }
        return view('versions.edit', compact('version','yearlist', 'issueId', 'yearId', 'issuelist'));
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
        if ($request->hasFile('file_path')) {
            $uploadPath = public_path('/uploads/');

            $extension = $request->file('file_path')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $request->file('file_path')->move($uploadPath, $fileName);
            $requestData['file_path'] = $fileName;

            $fileType = 'pdf';
            if($extension != 'pdf')
                $fileType = 'doc';
        }
        $version = Version::findOrFail($id);
        $version->update($requestData);

        $versionIssue = IssueVersion::where('version_id', $id)->first();
        $versionIssue->update(['issue_id' => $requestData['issue_id']]);

        Session::flash('flash_message', 'Version updated!');

        return redirect('versions');
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
        Version::destroy($id);

        Session::flash('flash_message', 'Version deleted!');

        return redirect('versions');
    }
}
