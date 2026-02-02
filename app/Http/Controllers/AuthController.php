<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function login(ApiLoginRequest $request){


        if (!Auth::attempt($request->only('email' ,'password'))) {
            return response()->json([
                'status' => 'error',
                'massage' => 'invalid credentials',
            ],401);
        }
     
        $user = User::firstWhere('email' , $request->email);
        

        $token = $user->createToken('api token for '.$user->email)->plainTextToken;

        return response()->json([
            $token
        ],200);
    }


    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'massage' => 'logged out',
        ],200);
    }
}
