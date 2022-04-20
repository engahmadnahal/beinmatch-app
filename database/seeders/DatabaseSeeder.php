<?php

namespace Database\Seeders;

use App\Models\ClubFollower;
use App\Models\DawryFollower ;
use App\Models\Employee;
use App\Models\Post;
use App\Models\User;
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
        Post::factory(20)->create();
        // ClubFollower::factory(30)->create();
        // DawryFollower::factory(30)->create();

    }
}
