<?php
namespace App\Http\Helpers;
use Illuminate\Http\Exceptions\HttpResponseException;

class Helper
{
    public static function sendError($message, $errors = [], $code = 401)
    {
        $res = ['success' => false, 'message' => $message];
        if (!empty($errors)) {
            $res['data'] = $errors;
        }
        throw new HttpResponseException(response()->json($res, $code));
    }
}
