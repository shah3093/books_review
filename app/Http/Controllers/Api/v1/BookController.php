<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Response;

class BookController extends Controller
{
    use ApiResponseTrait;

    public function getMostReviewdBooks($limit=10)
    {
        $review_obj = new Review();
        $results = $review_obj->getMostReviewdBooks($limit);

        $i = 0;
        foreach ($results as  $key=>$result) {
           $data[$key] = [
               'book_id' => $result['book']['id'],
               'book_image_url' => $result['book']['image'],
               'book_name' => $result['book']['name'],
               'number_of_reviewd' => $result['book_reviewd_num']
           ];
        }

       
        $message = "Top ".$limit." most reviewd books";
        return $this->successResponse($message,$data);
    }


    public function getBooks()
    {
        $bookObj = new Book();
        $results = $bookObj->getBooksWithPaginate();

        $data = $results;

        // foreach ($results as  $key=>$result) {
        //     $data[$key] = [
        //         'book_id' => $result['id'],
        //         'book_image_url' => $result['image'],
        //         'book_name' => $result['name']
        //     ];
        //  }

        $message = "List of books with paginated";
        return $this->successResponse($message,$data);
    }
}
