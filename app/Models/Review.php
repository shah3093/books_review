<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function vote()
    {
        return $this->hasMany(Vote::class);
    }

    public function getMostReviewdBooks($limit=10)
    {
        $result = Review::with('book')
        ->select(DB::raw('count(book_id) as book_reviewd_num, book_id'))
        ->groupBy('book_id')
        ->orderBy('book_reviewd_num', 'desc')
        ->limit($limit)
        ->get();

        return $result;
    }

    public function getReviewById($review_id)
    {
    
    }

    public function getReviewsByBookId($book_id)
    {
        $result = Review::with('user','vote')
        ->where('book_id',$book_id)
        ->where('status',1)
        ->get();

        return $result;
    }
}
