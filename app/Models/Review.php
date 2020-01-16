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
}
