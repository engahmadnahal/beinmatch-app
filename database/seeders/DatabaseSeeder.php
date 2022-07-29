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


        /**
         * First step : go Route web and get club 
         * 2 - get dawry
         * 3 - run get data club 
         * 4 - run command db:seed --class="PermissionSeeder"
         * 5 - run command db:seed
         * 
         */

        if(User::where('email', 'guest@guest.com')->first() == null){
            User::create([
                'fname' => "Guest",
                'lname' => "User",
                'username' => "GuestUser",
                'avater' => "assets/img/upload/media/login.png",
                'email' => "guest@guest.com",
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => "active",
            ]);
        }

        /**
         * Create A Admin User
         */

         if(Employee::where('email', 'admin@admin.com')->first() == null){
            Employee::create([
                'fname'=>"Admin",
                'lname'=>"Admin",
                'username'=>"Admin",
                'avater'=>"assets/img/upload/media/login.png",
                'email'=>"admin@admin.com",
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'salary'=>"000000",
                'jop_title'=>'Admin',
                'email_verified_at' => now(),
            ]);
            $admin = Employee::findOrFail(1);
            $admin->givePermissionTo(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39);
         }

       
        Employee::factory(50)->create();
        User::factory(50)->create();
        Post::factory(20)->create();
        // ClubFollower::factory(30)->create();
        // DawryFollower::factory(30)->create();
        // Comment::factory(40)->create();
        // View::factory(25)->create();
        // Like::factory(20)->create();

        /*
            Create A Guset User
        */


        /**
         * Create a setting for mobile
         * id	slide_active	match_active	ads_active	created_at	updated_at
         */
        if(Setting::find(1) == null){
            $dataSetting = [
                "slide_active"=>true,
                "match_active"=>false,
                "ads_active"=>false,
                "facebook"=>"www.facebook.com",
                "youtube"=>"www.youtube.com",
                "twitter"=>"www.twitter.com",
            ];
            Setting::create([
                'settings'=>json_encode($dataSetting),
                'type'=>'mobile'
            ]);
        }

       

    }
}
