<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\NewUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function delete($id)
    {
        $user = NewUser::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
