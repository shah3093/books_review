<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Subject;
use App\Utils\CommonFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = new Book();
        $books = $data['books'] = $book->getAllWithRelation();
        return view('admin.book.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['authors'] = Author::get();
        $data['publishers'] = Publisher::get();
        $data['subjects'] = Subject::get();

        return view('admin.book.create', $data);
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
            'status' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'image' => 'required|image',
            'subjects' => 'required|array',
        ]);

        $img_path = $request->file('image')->store('books');

        $data = [
            'name' => $request->input('name'),
            'summary' => $request->input('summary'),
            'image' => $img_path,
            'publisher_id' => $request->input('publisher_id'),
            'author_id' => $request->input('author_id'),
            'status' => $request->input('status'),
            'subjects' => $request->input('subjects'),
        ];

        $book = new Book();
        $status_code = $book->storeData($data);

        if ($status_code == 100) {
            CommonFunction::flash('Book successfully created', 'success');
            return redirect()->route('book');
        } else if ($status_code == 2) {
            CommonFunction::flash('Publisher not found', 'danger');
            return redirect()->back();
        } else if ($status_code == 3) {
            CommonFunction::flash('Author not found', 'danger');
            return redirect()->back();
        }else if ($status_code == 4) {
            CommonFunction::flash('Subject not found', 'danger');
            return redirect()->back();
        } else {
            CommonFunction::flash('Unknown error', 'danger');
            return redirect()->back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book_id)
    {
        $data['authors'] = Author::get();
        $data['publishers'] = Publisher::get();
        $data['book'] = Book::with('bookSubject')->find($book_id);
        $data['subjects'] = Subject::get();

        if (!empty($data['book'])) {
            return view('admin.book.edit', $data);
        } else {
            CommonFunction::flash('Book not found', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book_id)
    {
        $img_path = null;

        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'image' => 'image',
            'subjects' => 'required|array',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($request->input('old_img'));
            $img_path = $request->file('image')->store('books');
        }

        $data = [
            'name' => $request->input('name'),
            'summary' => $request->input('summary'),
            'publisher_id' => $request->input('publisher_id'),
            'author_id' => $request->input('author_id'),
            'status' => $request->input('status'),
            'subjects' => $request->input('subjects'),
        ];

        if (!empty($img_path)) {
            $data['image'] = $img_path;
        }

        $book = new Book();
        $status_code = $book->updateData($book_id, $data);

        if ($status_code == 100) {
            CommonFunction::flash('Book successfully updated', 'success');
            return redirect()->route('book');
        } else if ($status_code == 2) {
            CommonFunction::flash('Publisher not found', 'danger');
            return redirect()->back();
        } else if ($status_code == 3) {
            CommonFunction::flash('Author not found', 'danger');
            return redirect()->back();
        } else if ($status_code == 5) {
            CommonFunction::flash('Book not found', 'danger');
            return redirect()->back();
        }else if ($status_code == 4) {
            CommonFunction::flash('Subject not found', 'danger');
            return redirect()->back();
        } else {
            CommonFunction::flash('Unknown error', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id)
    {
        $user = new Book();
        $status = $user->deleteData($book_id);
        if ($status == 100) {
            CommonFunction::flash('Book successfully updated', 'success');
            return redirect()->route('book');
        } else if ($status == 2) {
            CommonFunction::flash('Book not found', 'danger');
            return redirect()->back();
        } else {
            CommonFunction::flash('Unknown error', 'danger');
            return redirect()->back();
        }
    }
}
