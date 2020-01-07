<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    const BOOK_STATUS = [
        1 => 'Active',
        0 => 'Inactive',
    ];

    public function publisher(){
        return $this->belongsTo(Publisher::class,'publisher_id');
    }
    
    public function author(){
        return $this->belongsTo(Author::class,'author_id');
    }

    public function getAllWithRelation()
    {
        return Book::with('publisher','author')->get();
    }

    public function storeData($data)
    {

        $status_code = $this->validateData($data);

        if ($status_code != 100) {
            return $status_code;
        }

        $book = new Book();

        $book->name = $data['name'];
        $book->summary = $data['summary'];
        $book->image = $data['image'];
        $book->publisher_id = $data['publisher_id'];
        $book->author_id = $data['author_id'];
        $book->status = $data['status'];

        $book->save();
        return $status_code;
    }


    public function updateData($id, $data)
    {
        $status_code = $this->validateData($data);

        if ($status_code != 100) {
            return $status_code;
        }

        $book = Book::find($id);

        if (!empty($book)) {
            $book->name = $data['name'];
            $book->summary = $data['summary'];
            $book->publisher_id = $data['publisher_id'];
            $book->author_id = $data['author_id'];
            $book->status = $data['status'];

            if(!empty($data['image'])){
                $book->image = $data['image'];
            }

            $book->save();

        } else {
            $status_code = 4;
        }

        return $status_code;
    }

    public function deleteData($id)
    {
        $statusCode = 100;

        $book = Book::find($id);

        if (!empty($book)) {
            Storage::delete($book['image']);
            $book->delete();
        } else {
            $statusCode = 2;
        }

        return $statusCode;
    }


    private function validateData($data)
    {
        $status_code = null;

        $publisher = Publisher::find($data['publisher_id']);

        if (empty($publisher)) {
            $status_code = 2;
        }

        if (empty($status_code)) {
            $author = Author::find($data['author_id']);

            if (empty($author)) {
                $status_code = 3;
            }
        }

        if (empty($status_code)) {
            $status_code = 100;
        }

        return $status_code;
    }
}
