<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\NewUser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createNewUser(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:new_users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $user = NewUser::create($data);

        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }
}