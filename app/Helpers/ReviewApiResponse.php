<?php

namespace App\Helpers;

class ReviewApiResponse
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }
    public static function sendResponse($status=200, $message, $data = null)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }

}
