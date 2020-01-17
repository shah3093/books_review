<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    use ApiResponseTrait;
    
    public function getPublisher()
    {
        $publisherObj = new Publisher();
        $results = $publisherObj->getAllWithNameId();

        $data = $results;

        $message = "List of all publishers";
        return $this->successResponse($message,$data);
    }
}
