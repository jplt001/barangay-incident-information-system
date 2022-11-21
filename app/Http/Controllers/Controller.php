<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function ApiResponse($message, $code = 200, $status = true, $data = null) {
        $responseData = [
            "message"=> $message,
            'status' => $status,
            'code' => $code,
            'data' => $data
        ];
        if(empty($data)) {
            unset($responseData['data']);
        }
        return response()->json($responseData, $code);
    }


    public function UnauthorizedApiResponse()
    {
        $response = [
            "status" => false,
            "code"=> 401,
            "message" => "Unauthenticated",
        ];

        return response()->json($response, 401);
    }
}
