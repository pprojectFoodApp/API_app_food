<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return response()->json([
            'token' => Auth::attempt($credentials),
        ]);
        return response()->json(['error' => 'invalid_credentials'], 401);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}