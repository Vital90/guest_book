<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'middleware' => ['api', 'jwt.auth'],
], function ($router) {
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('api')->post('/login', [AuthController::class, 'login']);
Route::middleware('api')->post('/register', [UserController::class, 'register']);
Route::middleware(['api', 'jwt.auth', 'role'])->post('/reviews/{id}/comment', [CommentController::class, 'store']);


