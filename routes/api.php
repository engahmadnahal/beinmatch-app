<?php

use App\Http\Controllers\Api\ClubController;
use App\Http\Controllers\Api\DawryController;
use App\Http\Controllers\Api\LogController;
use App\Http\Controllers\Api\MobaraController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\UserAuthController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
    /**
     * Change Lang For All Route
     */
    Carbon::setLocale('ar');
    App::setlocale('ar');

    Route::get('/ip',function(Request $request){
        return response()->json(["user_id" => $request->ip()],200);

    });

    Route::get('/setting',[SettingController::class,'getSetting']);
    Route::post('/log',[LogController::class,'sendLogs']);
    // Auth
    Route::post('/user/login', [UserAuthController::class , 'login']);
    Route::post('/user/signup', [UserAuthController::class , 'signup']);

    /**
     *
     *  @Routes For Post Controller
     */

    // // Get Posts Api For non Auth users
    // Route::get('/posts', [PostController::class , 'index']);
    // // Get Single Post Api For non Auth users
    // Route::get('/posts/{id}', [PostController::class , 'show']);
    // // Get All Comments For Post
    // Route::get('/post/{id}/comments',[PostController::class , 'getAllComments']);
    // // Register View For Post
    // Route::post('post/{id}/view', [PostController::class , 'registerView']);


    /**
     *
     *  @Routes For Mobara Controller
     */

    // Get All Mobara Api For non Auth users
    Route::get('/mobara', [MobaraController::class , 'index']);
    // Get All Mobara Api For non Auth users
    Route::get('/mobara/today', [MobaraController::class , 'today']);
    // Get Single Mobara Api For non Auth users
    Route::get('/mobara/{id}', [MobaraController::class , 'show']);
    // Get All Comments For Mobara
    Route::get('/mobara/{id}/comments',[MobaraController::class , 'getAllComments']);

    /**
     *
     *  @Routes For Search Controller
     */

    Route::post('/search',[SearchController::class , 'getData']);

    /**
     *
     *  @Routes For Club Controller
     */

    // Get All Clubs Api For  Auth users
    Route::get('/clubs', [ClubController::class , 'index']);
    Route::get('/clubs/{club}/show', [ClubController::class , 'show']);
    /**
     *
     *  @Routes For Dawry Controller
     */
    Route::get('/dawries', [DawryController::class , 'index']);
    Route::get('/dawries/{id}/show', [DawryController::class , 'show']);




    // Auth route
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/user/logout', [UserAuthController::class , 'logout']);
        // Send Comment Api For  Auth users
        Route::post('mobara/{id}/comment', [MobaraController::class , 'createComment']);
        // Update Comment Api For  Auth users
        Route::post('mobara/{id}/comment/{commentlive}/edit', [MobaraController::class , 'updateComment']);
        // Delete Comment Api For  Auth users
        Route::post('mobara/comment/{commentlive}/delete', [MobaraController::class , 'deleteComment']);
        // Send Poll Api For  Auth users
        Route::post('mobara/{id}/poll', [MobaraController::class , 'createPoll']);
        // Send Like For Mobara
        Route::post('mobara/{id}/like', [MobaraController::class , 'createLike']);

        /**
         *
         * Create Comment and like to Post Api For  Auth users
         *
         */

        // Get Posts Api For  Auth users
        Route::get('/posts', [PostController::class , 'index']);
        // Get Single Post Api  non Auth users
        Route::get('/posts/{id}', [PostController::class , 'show']);

        // Register View For Post
        Route::post('post/{id}/view', [PostController::class , 'registerView']);
        // Send Comment Api For  Auth users
        Route::post('post/{id}/comment/send', [PostController::class , 'createComment']);
        // Update Comment Api For  Auth users
        Route::post('post/{id}/comment/{comment}/edit', [PostController::class , 'updateComment']);
        // Delete Comment Api For  Auth users
        Route::post('post/comment/{comment}/delete', [PostController::class , 'deleteComment']);
        // Get All Comments For Post
        Route::get('/post/{id}/comments/show',[PostController::class , 'getAllComments']);
        // Send Like For Post
        Route::post('post/{id}/like', [PostController::class , 'createLike']);
        // Check User Like For Post
        Route::get('post/{post}/user-like', [PostController::class , 'checkUserLike']);

        /**
         *
         * @Routes For Support Controller
         */
         Route::post('/support', [SupportController::class , 'sendSupport']);
        /**
         *
         * @Routes For Club Controller
         */
        Route::get('/clubs/favorite', [ClubController::class , 'getFavorites']);
        Route::post('/clubs/favorite/create', [ClubController::class , 'createFavorite']);

    });





});
