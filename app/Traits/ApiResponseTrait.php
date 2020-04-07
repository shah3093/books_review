<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;

trait ApiResponseTrait
{
    public function successResponse($message,$data)
    {
        $response = [
            'status' => 5000,
            'message' => $message,
            'data' => $data
        ];

        // sleep(5);

        return response()->json($response,200);
    }
}