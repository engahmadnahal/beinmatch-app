<?php

use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermUseController;
use App\Http\Controllers\V2\Api\ClubController;
use App\Http\Controllers\V2\Api\DawryController;
use App\Http\Controllers\V2\Api\LogController;
use App\Http\Controllers\V2\Api\MobaraController;
use App\Http\Controllers\V2\Api\NotificationController;
use App\Http\Controllers\V2\Api\PostController;
use App\Http\Controllers\V2\Api\SearchController;
use App\Http\Controllers\V2\Api\SettingController;
use App\Http\Controllers\V2\Api\SupportController;
use App\Http\Controllers\V2\Api\UserAuthController;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


// This is test get server
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


Route::prefix('v2')->group(function () {

    // For Web Api match
    Route::get('/web/mobara/today', [MobaraController::class, 'today']);

    /**
     * Change Lang For All Route
     */
    Carbon::setLocale('ar');
    App::setlocale('ar');


    Route::get('/setting', [SettingController::class, 'getSetting']);
    Route::post('/log', [LogController::class, 'sendLogs']);
    // Auth
    Route::post('/user/login', [UserAuthController::class, 'login']);
    Route::post('/user/signup', [UserAuthController::class, 'signup']);

    Route::get('/privacy', [PrivacyController::class, 'show']);
    Route::get('/term', [TermUseController::class, 'show']);
    
    Route::middleware('auth:user-api')->group(function () {

        /**
         *
         *  @Routes For Mobara Controller
         */

        // Get All Mobara Api For non Auth users
        Route::get('/mobara', [MobaraController::class, 'index']);
        // Get All Mobara Api For non Auth users
        Route::get('/mobara/today', [MobaraController::class, 'today']);
        Route::get('/mobara/today/next', [MobaraController::class, 'nextMatch']);
        Route::post('/mobara/today/zone', [MobaraController::class, 'todayZone']);
        Route::get('/mobara/tomorrow', [MobaraController::class, 'tomorrow']);
        Route::get('/mobara/ysetday', [MobaraController::class, 'ysetday']);
        // Get Single Mobara Api For non Auth users
        Route::get('/mobara/{id}', [MobaraController::class, 'show']);
        // Get All Comments For Mobara
        Route::get('/mobara/{id}/comments', [MobaraController::class, 'getAllComments']);
        // Send Comment Api For  Auth users
        Route::post('mobara/{id}/comment', [MobaraController::class, 'createComment']);
        // Update Comment Api For  Auth users
        Route::post('mobara/{id}/comment/{commentlive}/edit', [MobaraController::class, 'updateComment']);
        // Delete Comment Api For  Auth users
        Route::post('mobara/comment/{commentlive}/delete', [MobaraController::class, 'deleteComment']);
        // Send Poll Api For  Auth users
        Route::post('mobara/{id}/poll', [MobaraController::class, 'createPoll']);
        // Send Like For Mobara
        Route::post('mobara/{id}/like', [MobaraController::class, 'createLike']);
        // Register View For Post
        Route::post('mobara/{id}/view', [MobaraController::class, 'registerView']);

        /**
         *
         *  @Routes For Search Controller
         */

        Route::post('/search', [SearchController::class, 'getData']);

        /**
         *
         *  @Routes For Club Controller
         */

        // Get All Clubs Api For  Auth users
        Route::get('/clubs', [ClubController::class, 'index']);
        Route::get('/clubs/{club}/show', [ClubController::class, 'show']);
        /**
         *
         *  @Routes For Dawry Controller
         */
        Route::get('/dawries', [DawryController::class, 'index']);
        Route::get('/dawries/{id}/show', [DawryController::class, 'show']);


        /**-------------- {Auth Controller} ---------------------  */




        // Auth route
        Route::post('/user/logout', [UserAuthController::class, 'logout']);
        Route::post('/user/isonline', [UserAuthController::class, 'sendOnlineUser']);
        Route::get('/user/status', [UserAuthController::class, 'statusUser']);


        /**
         *
         * Create Comment and like to Post Api For  Auth users
         *
         */

        Route::get('/posts/recommended', [PostController::class, 'recommendedPost']);
        // Get Posts Api For  Auth users
        Route::get('/posts', [PostController::class, 'index']);
        // Get Single Post Api  non Auth users
        Route::get('/posts/{id}', [PostController::class, 'show']);

        // Register View For Post
        Route::post('post/{id}/view', [PostController::class, 'registerView']);
        // Send Comment Api For  Auth users
        Route::post('post/{id}/comment/send', [PostController::class, 'createComment']);
        // Update Comment Api For  Auth users
        Route::post('post/{id}/comment/{comment}/edit', [PostController::class, 'updateComment']);
        // Delete Comment Api For  Auth users
        Route::post('post/comment/{comment}/delete', [PostController::class, 'deleteComment']);
        // Get All Comments For Post
        Route::get('/post/{id}/comments/show', [PostController::class, 'getAllComments']);
        // Send Like For Post
        Route::post('post/{id}/like', [PostController::class, 'createLike']);

        /**
         *
         * @Routes For Support Controller
         */
        Route::post('/support', [SupportController::class, 'sendSupport']);
        /**
         *
         * @Routes For Favorite Controller
         */
        Route::get('/clubs/favorite', [ClubController::class, 'getFavorites']);
        Route::get('/clubs/{id}/favorite', [ClubController::class, 'checkFavorite']);
        Route::post('/clubs/favorite/create', [ClubController::class, 'createFavorite']);
        Route::post('/clubs/favorite/remove', [ClubController::class, 'removeFavorite']);
        Route::post('/clubs/favorite/remove-all', [ClubController::class, 'removeAllFavorite']);

        /**
         *
         * @Routes For Notification Controller
         */
        Route::get('/notification', [NotificationController::class, 'getNotifications']);
        Route::post('/notification/read', [NotificationController::class, 'readAll']);
        Route::post('notification/token-mobile', [NotificationController::class, 'saveTokenMobile']);
    });
});




