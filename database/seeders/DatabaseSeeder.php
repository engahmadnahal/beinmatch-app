<?php

namespace Database\Seeders;

use App\Models\ClubFollower;
use App\Models\Comment;
use App\Models\DawryFollower ;
use App\Models\Employee;
use App\Models\Like;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Employee::factory(50)->create();
        // User::factory(50)->create();
        // Post::factory(20)->create();
        // ClubFollower::factory(30)->create();
        // DawryFollower::factory(30)->create();
        // Comment::factory(40)->create();
        // View::factory(25)->create();
        // Like::factory(20)->create();

        /*
            Create A Guset User
        */
        User::create([
            'fname' => "Guest",
            'lname' => "User",
            'username' => "GuestUser",
            'avater' => "assets/img/upload/media/login.png",
            'email' => "guest@guest.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => "active",
        ]);

        /**
         * Create A Admin User
         */
        Employee::create([
            'fname'=>"Admin",
            'lname'=>"Admin",
            'username'=>"Admin",
            'avater'=>"assets/img/upload/media/login.png",
            'email'=>"admin@admin.com",
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'salary'=>"000000",
            'jop_title'=>'Admin',
        ]);

        /**
         * Create a setting for mobile
         * id	slide_active	match_active	ads_active	created_at	updated_at
         */
        Setting::create([
            "slide_active"=>0,
            "match_active "=>1,
            "ads_active"=>0,
        ]);

    }
}
