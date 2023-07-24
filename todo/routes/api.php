<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\LoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return ['message' => 'This is a test route'];
});

Route::post('/new-users', [UserController::class, 'createNewUser']);

Route::delete('/users/{id}', [UserController::class, 'delete']);

Route::put('/users/{id}', [UserController::class, 'update']);

Route::get('/users', [UserController::class, 'all']);

// http://127.0.0.1:8000/api/users/filter?name=RAH
Route::get('/users/filter', [UserController::class, 'filterByName']);

Route::get('/users/{id}', [UserController::class, 'show']);

Route::post('/todos', [TodoController::class, 'createTodo']);

Route::post('/login', [LoginController::class, 'login']);