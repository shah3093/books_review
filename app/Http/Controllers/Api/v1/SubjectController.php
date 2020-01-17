<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    use ApiResponseTrait;
    
    public function getSubject()
    {
        $subjectObj = new Subject();
        $results = $subjectObj->getAllWithNameId();

        $data = $results;

        $message = "List of all subjects";
        return $this->successResponse($message,$data);
    }
}
