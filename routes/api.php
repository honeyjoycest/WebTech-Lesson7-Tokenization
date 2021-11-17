<?php

use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\MoviePostController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[MovieController::class,'login']);
Route::post('register',[MovieController::class,'register']);
Route::post('reset-password',[MovieController::class,'resetPassword']);

// POSTS
Route::get('get-all-posts',[MoviePostController::class,'getAllPosts']);
Route::get('get-post',[MoviePostController::class,'getPost']);
Route::get('search-post',[MoviePostController::class,'searchPost']);
