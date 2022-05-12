<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;


class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                Log::info("Entrou");
                /** @var User $user */
                $user = Auth::user();
                $token = $user->createToken('API Token')->accessToken;
                
           /*      if (config('auth.must_verify_email') && !$user->hasVerifiedEmail()) {
                    Log::info("Entrou");
                    return response([
                        'message' => 'Email must be verified.'
                    ], 401);
                } */

                return response([
                    'message' => 'Login bem sucedido!',
                    'token' => $token,
                    'user' => $user
                ],200);
            }
        } catch (\Exception $e) {
            return response([
                'message' => 'Internal error, please try again later.'.$e->getMessage()
            ], 400);
        }

        return response([
            'message' => 'E-mail ou password ínválida!'
        ], 201);
    }

    public function user()
    {
        return response()->json(Auth::user());
    }

    public function verifyToken(Request $request)
    {
        if(Auth::guard('api')->check())
        {
            return response(["msg"=>"Valid token"],200);
        }
            return response(["msg"=>"Invalid token"],404);
    }
}
