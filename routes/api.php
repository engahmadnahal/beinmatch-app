<?php

use App\Http\Controllers\Api\MobaraController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserAuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return auth()->user();
// });


Route::prefix('v1')->group(function(){

    // Guest route
    Route::middleware('guest:sanctum')->group(function(){
        // Create Auth users
        Route::post('/user/login', [UserAuthController::class , 'login']);
        Route::post('/user/signup', [UserAuthController::class , 'signup']);

        // Get Posts Api For non Auth users
        Route::get('/posts', [PostController::class , 'index']);
        // Get Single Post Api For non Auth users
        Route::get('/posts/{id}', [PostController::class , 'show']);
        // Get All Mobara Api For non Auth users
        Route::get('/mobara', [MobaraController::class , 'index']);
        // Get Single Mobara Api For non Auth users
        Route::get('/mobara/{id}', [MobaraController::class , 'show']);


    });

    // Auth route
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/user/logout', [UserAuthController::class , 'logout']);
    });





});
