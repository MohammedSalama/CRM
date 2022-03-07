<?php

namespace App\Http\Controllers\Api;

trait ApiResponseTrait
{
    public function apiResponse($data = null , $messsage = null , $status = null)
    {
        $array = [
            'status' => $status,
            'data' => $data,
            'message' => $messsage,
        ];
        return response($array , 200);
    }

}
