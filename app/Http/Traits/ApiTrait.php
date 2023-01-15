<?php

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Http\Request;

trait ApiTrait
{
    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnErrorMessage($msg,$code)
    {
        return response()->json([
            'code' => $code,
            'message' => $msg
        ]);
    }

    public function returnError($msg,$error,$code)
    {
        return response()->json([
            'code'=>$code,
            'message' => $msg,
            'errors'=>$error
        ]);
    }

    public function returnSuccessMessage($msg,$code)
    {
        return [
            'code' => $code,
            'message' => $msg
        ];
    }

    public function returnData($value, $msg , $code)
    {
        return response()->json([
            'code' => 1,
            'message' => $msg,
            'user' => $value
        ]);
    }
    public function returnUserData($user,$token, $msg , $code)
    {
        return response()->json([
            'code' => 1,
            'message' => $msg,
            'user' => $user,
            'token'=> $token
        ]);
    }

    public function returnSearchData($value1, $msg , $code)
    {
        return response()->json([
            'code' => $code,
            'message' => $msg,
            'data' => $value1,
        ]);
    }
}
