<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\Auth\AuthentificationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', function(){
    return User::all();
});

Route::group(['namespace'=>'Api\Auth'], function(){
    Route::post('login',[AuthentificationController::class, 'login']);
});

Route::get('posts',[PostController::class, 'index']);

Route::post('post',[PostController::class, 'store']);

Route::get('post/{id}',[PostController::class, 'show']);

Route::put('post/{id}',[PostController::class, 'update']);

Route::delete('post/{id}',[PostController::class, 'destroy']);

// Route::get('login',[AuthentificationController::class, 'show']);
