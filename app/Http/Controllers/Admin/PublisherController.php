<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Utils\CommonFunction;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new Publisher();
        $data['publisher'] = $user->getAll();
        return view('admin.publisher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publisher.create');
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
            'name' => 'required',
            'email' => 'email|nullable'
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'details' => $request->input('details')
        ];

        $user = new Publisher();
        $userObj = $user->storeData($data);

        if (!empty($userObj)) {

            CommonFunction::flash('Publisher successfully created', 'success');
            return redirect()->route('publisher');
        } else {
            CommonFunction::flash('Publisher creation failed', 'danger');
            return redirect()->back();
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['publisher'] = Publisher::find($id);

        if (!empty($data['publisher'])) {
            return view('admin.publisher.edit', $data);
        } else {
            CommonFunction::flash('Publisher not found', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|nullable',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'details' => $request->input('details')
        ];

        $user = new Publisher();
        $status = $user->updateData($id, $data);
        if ($status == 100) {
            CommonFunction::flash('Publisher successfully updated', 'success');
            return redirect()->route('publisher');
        } else {
            CommonFunction::flash('Publisher not found', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = new Publisher();
        $status = $user->deleteData($id);
        if ($status == 100) {
            CommonFunction::flash('Publisher successfully updated', 'success');
            return redirect()->route('publisher');
        } else if ($status == 2) {
            CommonFunction::flash('Publisher not found', 'danger');
            return redirect()->back();
        } else {
            CommonFunction::flash('Unknown error', 'danger');
            return redirect()->back();
        }
    }
}
