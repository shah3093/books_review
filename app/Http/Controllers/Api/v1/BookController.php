<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Response;

class BookController extends Controller
{
    use ApiResponseTrait;

    public function getMostReviewdBooks($limit = 10)
    {
        $review_obj = new Review();
        $results = $review_obj->getMostReviewdBooks($limit);

        $i = 0;
        foreach ($results as  $key => $result) {
            $data[$key] = [
                'book_id' => $result['book']['id'],
                'book_image_url' => $result['book']['image'],
                'book_name' => $result['book']['name'],
                'number_of_reviewd' => $result['book_reviewd_num']
            ];
        }


        $message = "Top " . $limit . " most reviewd books";
        return $this->successResponse($message, $data);
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
        return $this->successResponse($message, $data);
    }

    public function show(Request $request, $book_id)
    {
        $bookObj = new Book();
        $book = $bookObj->getById($book_id);
        // dd($book['bookSubject']);
        if (isset($book->id)) {

            $authors = [];
            $subjects = [];

            foreach ($book['bookAuthor'] as $author) {
                $tmp_author = [
                    'author_name' => $author['author']['name'],
                    'author_id' => $author['author']['id']
                ];

                array_push($authors, $tmp_author);
            }

            foreach ($book['bookSubject'] as $bookSubject) {
                $tmp_subject = [
                    'subject_name' => $bookSubject['subject']['name'],
                    'subject_id' => $bookSubject['subject']['id'],
                ];
                array_push($subjects, $tmp_subject);
            }

            $data = [
                'book_id' => $book['id'],
                'book_name' => $book['name'],
                'book_image' => $book['image'],
                'book_description' => $book['summary'],
                'publisher_id' => $book['publisher']['id'],
                'publisher_name' => $book['publisher']['name'],
                'authors' => $authors,
                'subjects' => $subjects,
            ];

            $message = "Books details";
            return $this->successResponse($message, $data);
        } else {
            abort(404);
        }
    }
}
