<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function createTodo(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'integer',
            'status' => 'in:pending,completed',
        ]);

        // Add the user_id to the data array using the authenticated user's ID
        $data['user_id'] = '1';

        $todo = Todo::create($data);

        return response()->json(['message' => 'Todo created successfully', 'todo' => $todo]);
    }
}
