<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
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

Route::get('/', [AdminController::class , 'index']);

Route::get('/posts',function(){
    return view('posts.index');
});
// Route::resource('posts', PostController::class);

Route::get('/posts/show',function(){
    return view('posts.show');
});

Route::get('/posts/trash',function(){
    return view('posts.trash');
});
Route::get('/posts/create',function(){
    return view('posts.craete');
});
Route::get('/posts/edit',function(){
    return view('posts.craete');
});
// Matches
// {{dd(date('Y-m-d H:i:s', strtotime("14:05")))}}
Route::get('/matches',function(){
    return view('matches.index');
});

Route::get('/matches/show',function(){
    return view('matches.show');
});

Route::get('/matches/trash',function(){
    return view('matches.trash');
});
Route::get('/matches/create',function(){
    return view('matches.craete');
});
Route::get('/matches/edit',function(){
    return view('matches.craete');
});
// Employees
Route::get('/employees',function(){
    return view('employees.index');
});

Route::get('/employees/show',function(){
    return view('employees.show');
});

Route::get('/employees/trash',function(){
    return view('employees.trash');
});
Route::get('/employees/create',function(){
    return view('employees.craete');
});

Route::get('/employees/chat',function(){
    return view('employees.chat');
});
Route::get('/employees/edit',function(){
    return view('employees.craete');
});
// User
Route::get('/users',function(){
    return view('users.index');
});

Route::get('/users/show',function(){
    return view('users.show');
});

Route::get('/users/trash',function(){
    return view('users.trash');
});
Route::get('/users/create',function(){
    return view('users.craete');
});
Route::get('/users/edit',function(){
    return view('users.craete');
});



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

// Dawry
Route::get('/dawry',function(){
    return view('dawry.index');
});

Route::get('/dawry/show',function(){
    return view('dawry.show');
});

Route::get('/dawry/create',function(){
    return view('dawry.craete');
});

Route::get('/dawry/edit',function(){
    return view('dawry.craete');
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

// Channels
Route::get('/channels',function(){
    return view('channels.index');
});

Route::get('/channels/show',function(){
    return view('channels.show');
});

Route::get('/channels/create',function(){
    return view('channels.craete');
});

Route::get('/channels/edit',function(){
    return view('channels.craete');
});

