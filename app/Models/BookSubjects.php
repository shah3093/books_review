<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookSubjects extends Model
{

    public $timestamps = false;

    public function book(){
        return $this->belongsTo(Book::class);
    }
    
    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function storeData($book_id,$subject_id,$update_data=false)
    {
        $book_subject = new BookSubjects();
        $book_subject->book_id = $book_id;
        $book_subject->subject_id = $subject_id;
        $book_subject->save();
    }


    public function deletData($book_id)
    {
        BookSubjects::where('book_id',$book_id)->delete();
    }
}
