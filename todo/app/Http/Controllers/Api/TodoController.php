<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
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

        // Get the authenticated user's ID and assign it to the data array
        $data['user_id'] = Auth::id(); // or $data['user_id'] = auth()->id();        
        $todo = Todo::create($data);

        return response()->json(['message' => 'Todo created successfully', 'todo' => $todo]);
    }
}
