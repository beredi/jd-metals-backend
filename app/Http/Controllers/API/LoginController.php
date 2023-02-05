<?php

namespace app\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\API\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only(["email", "password"]);

        if (!($token = \auth()->attempt($credentials))) {
            return response()->json(["Error" => "Incorrect credentials"], 401);
        }

        $user = User::where('email', $request->input('email'))->first();

        return response()->json([
            "AccessToken" => $token,
            "User" => new UserResource($user),
        ]);
    }

    public function refresh(): \Illuminate\Http\JsonResponse
    {
        $newToken = \auth()->refresh();
        return response()->json(["AccessToken" => $newToken]);
    }
}
