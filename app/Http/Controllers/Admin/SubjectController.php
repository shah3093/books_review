<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\CommonFunction;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new Subject();
        $data['subjects'] = $user->getAll();
        return view('admin.subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects'
        ]);

        $data = [
            'name' => $request->input('name')
        ];

        $user = new Subject();
        $userObj = $user->storeData($data);

        if (!empty($userObj)) {

            CommonFunction::flash('Subject successfully created', 'success');
            return redirect()->route('subject');
        } else {
            CommonFunction::flash('Subject creation failed', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['subject'] = Subject::find($id);

        if (!empty($data['subject'])) {
            return view('admin.subject.edit', $data);
        } else {
            CommonFunction::flash('Subject not found', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:subjects,name,' . $id,
        ]);

        $data = [
            'name' => $request->input('name')
        ];

        $user = new Subject();
        $status = $user->updateData($id, $data);
        if ($status == 100) {
            CommonFunction::flash('Subject successfully updated', 'success');
            return redirect()->route('subject');
        } else {
            CommonFunction::flash('Subject not found', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = new Subject();
        $status = $user->deleteData($id);
        if ($status == 100) {
            CommonFunction::flash('Subject successfully updated', 'success');
            return redirect()->route('subject');
        } else if ($status == 2) {
            CommonFunction::flash('Subject not found', 'danger');
            return redirect()->back();
        } else {
            CommonFunction::flash('Unknown error', 'danger');
            return redirect()->back();
        }
    }
}
