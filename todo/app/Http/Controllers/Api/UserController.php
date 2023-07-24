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

    public function update(Request $request, $id)
    {
        $user = NewUser::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $data = $request->validate([
            'email' => 'required|email|unique:new_users,email,' . $id,
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'sometimes|required|string|min:6',
        ]);

        $user->update($data);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }
    public function all()
    {
        $users = NewUser::all();

        return response()->json(['users' => $users]);
    }
}
