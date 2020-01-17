<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ApiResponseTrait;
    
    public function getAuthors()
    {
        $authorObj = new Author();
        $results = $authorObj->getAllWithNameId();

        $data = $results;

        $message = "List of all writers";
        return $this->successResponse($message,$data);
    }
}
