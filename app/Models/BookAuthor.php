<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    public $timestamps = false;

    public function book(){
        return $this->belongsTo(Book::class);
    }
    
    public function author(){
        return $this->belongsTo(Author::class);
    }
}
