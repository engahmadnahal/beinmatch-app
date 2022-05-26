<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\DawryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobaraController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Scraping\GetClubController;
use App\Http\Controllers\Scraping\GetDawryController;
use App\Http\Controllers\UserController;
use App\Models\Dawry;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('guest:admin')->group(function(){
    Route::get('/auth',[AuthController::class , 'index'])->name('auth.index');
    Route::post('/auth/login',[AuthController::class , 'login'])->name('auth.login');
});

Route::middleware('auth:admin')->group(function(){
    // Auth route
    Route::get('/', [HomeController::class ,'index'])->name('home.index');
    Route::post('/auth/logout',[AuthController::class , 'logout'])->name('auth.logout');

    // Employees
    Route::get('/employees/trash',[EmployeeController::class , 'trush'])->name('employees.trush');
    Route::get('/employees/chat',[EmployeeController::class , 'chat'])->name('employees.chat');
    Route::post('/employees/restor/{id}',[EmployeeController::class , 'restor'])->name('employees.restor');
    Route::resource('/employees',EmployeeController::class);

    // Post Routes
    Route::get('/posts/restor/{id}',[PostController::class , 'restor'])->name('posts.restor');
    Route::get('/posts/trash',[PostController::class,'trush'])->name('posts.trush');
    Route::post('/posts/delete-all',[PostController::class , 'deleteAll'])->name('posts.delete_all');
    Route::get('/posts/publish',[PostController::class , 'getPublish'])->name('posts.publish');
    Route::get('/posts/wait',[PostController::class , 'getWait'])->name('posts.wait');
    Route::get('/posts/cancel',[PostController::class , 'getCancel'])->name('posts.cancel');
    Route::resource('posts',PostController::class);


    // User
    Route::get('/users/trash',[UserController::class , 'trush'])->name('users.trush');
    Route::post('/users/restor/{id}',[UserController::class , 'restor'])->name('users.restor');
    Route::post('/users/block/{id}',[UserController::class,'block'])->name('users.block');
    Route::resource('/users',UserController::class);

    // Dawry
    Route::resource('dawries',DawryController::class);


    // Channels
    Route::resource('channels',ChannelController::class);

    // Matches
    Route::get('/matches/trash',[MobaraController::class , 'trush'])->name('matches.trush');
    Route::get('/matches/get-publish',[MobaraController::class , 'getPublish'])->name('matches.publish');
    Route::get('/matches/get-wait',[MobaraController::class , 'getWait'])->name('matches.wait');
    Route::get('/matches/get-cancel',[MobaraController::class , 'getCancel'])->name('matches.cancel');


    Route::post('/matches/restor/{id}',[MobaraController::class , 'restor'])->name('matches.restor');
    Route::resource('matches', MobaraController::class);





    // Analytics
    // User
    Route::get('/analytics/users',function(){
        return view('analytics.users');
    });

    Route::get('/analytics/history',function(){
        return view('analytics.history');
    });


    // Clubs
    Route::get('/clubs',function(){
        return view('clubs.index');
    });

    Route::get('/clubs/show',function(){
        return view('clubs.show');
    });

    Route::get('/clubs/create',function(){
        return view('clubs.craete');
    });

    Route::get('/clubs/edit',function(){
        return view('clubs.craete');
    });


    // Setting
    Route::get('/setting',function(){
        return view('setting.index');
    });

    // notification
    Route::get('/notification',function(){
        return view('notification.index');
    });

    Route::get('/notification/create',function(){
        return view('notification.craete');
    });





});




//// Scraping Data And Test Routes

Route::get('/get-dawry',[GetDawryController::class , 'getDawry']);
Route::get('/get-club',[GetClubController::class , 'getClub']);
Route::get('/get-data-club',[GetClubController::class , 'getDataClub']);

Route::get('/test',function(){
   $user = Post::where('id','23')->withCount('userLike')->first();
   return response()->json($user);
});
