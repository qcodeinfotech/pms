<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendRespone($data, $message)
    {
        return response()->json([
            'data' => $data,
            'message' => $message
        ]);
    }

    public function sendMessage($message)
    {
        return response()->json([
            'message' => $message
        ]);
    }
}
