<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function responseOK(string $message, mixed $data, int $code = Response::HTTP_OK): JsonResponse
    {
        return $this->response(true, $data, $message, $code);
    }

    public function responseFail(string $message, mixed $code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return $this->response(false,[], $message, $code);
    }
    public function response(bool $status, mixed $data, string $message, int $code): JsonResponse
    {
        return response()->json(
            [
                'status' => $status,
                'data' => $data,
                'message' => $message,
            ],
            $code
        );
    }
}
