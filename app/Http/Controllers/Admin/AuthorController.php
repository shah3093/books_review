<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Utils\CommonFunction;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new Author();
        $data['authors'] = $user->getAll();
        return view('admin.author.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'email' => 'email|nullable',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'details' => $request->input('details'),
        ];

        $author = new Author();
        $authorObj = $author->storeData($data);

        if (!empty($authorObj)) {
            CommonFunction::flash('Author successfully created', 'success');
            return redirect()->route('author');
        } else {
            CommonFunction::flash('Author creation failed', 'danger');
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
        $data['author'] = Author::find($id);

        if (!empty($data['author'])) {
            return view('admin.author.edit', $data);
        } else {
            CommonFunction::flash('Author not found', 'danger');
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
            'address' => $request->input('address'),
            'details' => $request->input('details'),
        ];

        $user = new Author();
        $status = $user->updateData($id, $data);
        if ($status == 100) {
            CommonFunction::flash('Author successfully updated', 'success');
            return redirect()->route('author');
        } else {
            CommonFunction::flash('Author not found', 'danger');
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
        $user = new Author();
        $status = $user->deleteData($id);
        if ($status == 100) {
            CommonFunction::flash('Author successfully updated', 'success');
            return redirect()->route('author');
        } else if ($status == 2) {
            CommonFunction::flash('Author not found', 'danger');
            return redirect()->back();
        } else {
            CommonFunction::flash('Unknown error', 'danger');
            return redirect()->back();
        }
    }
}
