<?php

namespace App\Http\Controllers\Api;

trait ApiResponseTrait
{
    /**
     * @param $data
     * @param $messsage
     * @param $status
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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
