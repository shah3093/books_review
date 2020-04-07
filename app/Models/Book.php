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

    public function bookSubject()
    {
        return $this->hasMany(BookSubjects::class);
    }
    
    public function bookAuthor()
    {
        return $this->hasMany(BookAuthor::class);
    }
    
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function getAllWithRelation()
    {
        return Book::with('publisher', 'author', 'bookSubject.subject')->get();
    }
    
    public function getById($book_id)
    {
        return Book::with('publisher', 'bookAuthor.author', 'bookSubject.subject')
        ->where(['id'=>$book_id,'status'=>1])->first();
    }
    
    public function getBooksWithPaginate($per_page=10)
    {
        return Book::select('id as book_id','name as title','image as image_url')->paginate($per_page);
    }

    public function getSubjectWiseBooks($limit,$subjects_id)
    {
        $results = Book::select('id as book_id','name as title','image as image_url')
        ->with(['bookSubject.subject' => function ($query) use ($subjects_id){
            $query->whereIn('id',[$subjects_id]);
        }])->limit($limit)->get();

        return $results;
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

        $status = $book->save();

        if (!empty($status)) {
            foreach ($data['subjects'] as $subject) {
                $d_subject = new BookSubjects();
                $d_subject->storeData(
                    $book->id,
                    $subject
                );
            }
        }

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

            if (!empty($data['image'])) {
                $book->image = $data['image'];
            }

            $status = $book->save();

            if (!empty($status)) {
                $d_subject = new BookSubjects();

                $d_subject->deletData($book->id);

                foreach ($data['subjects'] as $subject) {
                    
                    $d_subject->storeData(
                        $book->id,
                        $subject
                    );
                }
            }

        } else {
            $status_code = 5;
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
            foreach ($data['subjects'] as $subject) {
                $d_subject = Subject::find($subject);

                if (empty($d_subject)) {
                    $status_code = 4;
                }
                if (!empty($status_code)) {
                    break;
                }
            }
        }

        if (empty($status_code)) {
            $status_code = 100;
        }

        return $status_code;
    }
}
