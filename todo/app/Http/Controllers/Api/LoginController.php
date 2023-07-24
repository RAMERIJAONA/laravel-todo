<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the login data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json(['message' => 'Login successful','access_token' => $accessToken], 200);
        } else {
            // Authentication failed
            return response()->json(['error' => 'Invalid credentials. Please try again.'], 401);
        }
    }
}
