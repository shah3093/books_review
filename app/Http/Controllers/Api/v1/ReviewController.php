<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Traits\ApiResponseTrait;

class ReviewController extends Controller
{
    use ApiResponseTrait;

    public function getReview(Request $request, $review_id)
    {
        $reviewObj = new Review();
        $review = $reviewObj->getReviewById($review_id);
    }


    public function getReviewsByBookId(Request $request, $book_id)
    {
        $reviewObj = new Review();
        $reviews = $reviewObj->getReviewsByBookId($book_id);

        $data = [];

        if ($reviews->count() > 0) {
            foreach ($reviews as $key => $review) {

                $like = [];
                $dislike = [];

                foreach ($review['vote'] as  $vote) {
                    if($vote['type'] == "LIKE"){
                        array_push($like,$vote['id']);
                    }
                    else if($vote['type'] == "DISLIKE"){
                        array_push($dislike,$vote['id']);
                    }

                }


                $tmp_review = [
                    'review_id' => $review['id'],
                    'book_id' => $review['book_id'],
                    'short_review' => substr($review['comment'],0,200),
                    'user_id' => $review['user']['id'],
                    'user_name' => $review['user']['name'],
                    'like' => count($like),
                    'dislike' => count($dislike),
                ];

                array_push($data,$tmp_review);

            }

            $message = "Short reviews";
            return $this->successResponse($message, $data);

        } else {
            abort(404);
        }
    }
}
