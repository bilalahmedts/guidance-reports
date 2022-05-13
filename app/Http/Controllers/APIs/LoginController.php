<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(AuthRequest $request)
    { 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();
            $token = $user->createToken('touchstone')->accessToken;
            return response()->json(['token' => $token,'user'=>$user, 'message' => 'Login Successful'], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
