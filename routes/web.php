<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerifiyController;
use App\Http\Controllers\Auth\RessetPasswordController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\DawryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MangerFileController;
use App\Http\Controllers\MobaraController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Scraping\GetClubController;
use App\Http\Controllers\Scraping\GetDawryController;
use App\Http\Controllers\Scraping\GetMatchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Jobs\GetMatchJob;
use App\Jobs\SendUserNotifyJob;
use App\Models\MobileToken;
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
    Route::get('/auth/forgot',[RessetPasswordController::class , 'showForgot'])->name('auth.forgot');
    Route::post('/auth/reset',[RessetPasswordController::class , 'sendLinkReset'])->name('auth.reset');
    Route::get('/auth/reset-poassword/{token}',[RessetPasswordController::class , 'showResetPassword'])->name('password.reset');
    Route::post('/auth/reset-poassword',[RessetPasswordController::class , 'resetPassword'])->name('auth.reset_password');
});


Route::middleware('auth:admin')->group(function(){
    Route::get('/auth/verifiy-email',[EmailVerifiyController::class , 'showVerifiyEmail'])->name('verification.notice');
    Route::get('/auth/verifiy/{id}/{hash}',[EmailVerifiyController::class , 'verifiyEmail'])->name('verification.verify');
    Route::post('/auth/send-verifiy',[EmailVerifiyController::class , 'sendVerifiyEmail'])->middleware('throttle:1,1')->name('verification.send');
});

Route::middleware(['auth:admin','verified'])->group(function(){
    // Auth route
    Route::get('/', [HomeController::class ,'index'])->name('home.index');
    Route::post('/auth/logout',[AuthController::class , 'logout'])->name('auth.logout');

    // Employees
    Route::get('/employees/trash',[EmployeeController::class , 'trush'])->name('employees.trush');
    Route::get('/employees/chat',[EmployeeController::class , 'chat'])->name('employees.chat');
    Route::post('/employees/restor/{id}',[EmployeeController::class , 'restor'])->name('employees.restor');
    Route::get('/employees/{employee}/permission/edit',[EmployeeController::class , 'editUserPermission'])->name('employees.permissions');
    Route::put('/employees/{employee}/permission/update',[EmployeeController::class , 'updateUserPermission'])->name('employees.update_permissions');
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
    Route::get('/mobaras/trash',[MobaraController::class , 'trush'])->name('mobaras.trush');
    Route::get('/mobaras/get-publish',[MobaraController::class , 'getPublish'])->name('mobaras.publish');
    Route::get('/mobaras/get-wait',[MobaraController::class , 'getWait'])->name('mobaras.wait');
    Route::get('/mobaras/get-cancel',[MobaraController::class , 'getCancel'])->name('mobaras.cancel');
    Route::post('/mobaras/get-match',[MobaraController::class ,'getMatch'])->name('mobaras.get');

    Route::post('/mobaras/restor/{id}',[MobaraController::class , 'restor'])->name('mobaras.restor');
    Route::resource('mobaras', MobaraController::class);

    //Clubs Route Resource
    Route::post('/clubs/get-data-club',[ClubController::class ,'getDataClub']);
    Route::resource('clubs',ClubController::class);

    //Setting Route
    Route::get('/settings/mobile',[SettingController::class , 'mobile'])->name('settings.mobile');
    Route::post('/settings/mobile',[SettingController::class , 'saveSettingMobile'])->name('settings.saveMobile');



    // notifications
    Route::resource('/notifications',NotificationController::class);
    // mangerFile
    Route::resource('/manger_files',MangerFileController::class);



    // Analytics
    // User
    Route::get('/analytics/users',function(){
        return view('analytics.users');
    });

    Route::get('/analytics/history',function(){
        return view('analytics.history');
    });


    Route::get('/test-matches',function(){
        GetMatchJob::dispatch();
    });

});






//// Scraping Data And Test Routes

// Route::get('/get-dawry',[GetDawryController::class , 'getDawry']);
// Route::get('/get-club',[GetClubController::class , 'getClub']);
// // Route::get('/get-data-club',[GetClubController::class , 'getDataClub']);
// Route::get('/get-data-club',function(){
//     $urlScraping = ["https://jdwel.com/2021-2022-spanish-primera-division/"];
//     (new GetClubController)->getDataClub($urlScraping);
//     return "Done!";
// });


// Route::get('/test-matches',[GetMatchController::class , 'getMatch']);



