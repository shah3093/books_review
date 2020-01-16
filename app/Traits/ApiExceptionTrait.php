<?php

namespace App\Traits;

use Exception;

trait ApiExceptionTrait
{
    private function handleApiException($request, Exception $exception)
    {
        $exception = $this->prepareException($exception);

        if ($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
            $exception = $exception->getResponse();
        }

        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            $exception = $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            $exception = $this->convertValidationExceptionToResponse($exception, $request);
        }

        return $this->customApiResponse($exception);
    }

    private function customApiResponse($exception)
    {
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }

        $response = [];

        $response['status'] = $statusCode;
        $response['error']['code'] = $exception->getCode();

        switch ($statusCode) {
            case 401:
                $response['error']['message'] = 'Unauthorized';
                break;
            case 403:
                $response['error']['message'] = 'Forbidden';
                break;
            case 404:
                $response['error']['message'] = 'Not Found';
                break;
            case 405:
                $response['error']['message'] = 'Method Not Allowed';
                break;
            case 422:
                $response['error']['message'] = $exception->original['message'];
                $response['error']['errors'] = $exception->original['errors'];
                break;
            default:
                $response['error']['message'] = ($statusCode == 500) ? 'Whoops, looks like something went wrong' : $exception->getMessage();
                break;
        }

        if (config('app.debug')) {
            $response['error']['trace'] = $exception->getTrace();
        }

        return response()->json($response, $statusCode);
    }
}
