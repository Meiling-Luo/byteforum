<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes    
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    //any route in here is protected
    Route::apiResource('users.posts', PostController::class);
    Route::get('/users/{user_id}/posts/{post_id}/comments', [CommentController::class, 'index']);
});

Route::get('users/{user_id}/posts', [PostController::class, 'index']);

// Route::get('/posts/{post}/comments', [CommentController::class, 'index']);
Route::get('/users/{user_id}/posts/{post_id}/comments', [CommentController::class, 'index']);
