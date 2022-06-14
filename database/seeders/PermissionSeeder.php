<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(["name"=>"Create-Post","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Post","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-Post","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-Post","guard_name"=>"admin"]);
        Permission::create(["name"=>"Publish-Post","guard_name"=>"admin"]);

        Permission::create(["name"=>"Create-Match","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Match","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-Match","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-Match","guard_name"=>"admin"]);

        Permission::create(["name"=>"Read-Anly","guard_name"=>"admin"]);


        Permission::create(["name"=>"Create-User","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-User","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-User","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-User","guard_name"=>"admin"]);

        Permission::create(["name"=>"Create-Employee","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Employee","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-Employee","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-Employee","guard_name"=>"admin"]);

        Permission::create(["name"=>"Create-Permission","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Permission","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-Permission","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-Permission","guard_name"=>"admin"]);

        Permission::create(["name"=>"Create-Dawry","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Dawry","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-Dawry","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-Dawry","guard_name"=>"admin"]);

        Permission::create(["name"=>"Create-Club","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Club","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-Club","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-Club","guard_name"=>"admin"]);

        Permission::create(["name"=>"Create-Channel","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Channel","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-Channel","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-Channel","guard_name"=>"admin"]);

        // Permission::create(["name"=>"Create-Setting","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Setting","guard_name"=>"admin"]);
        // Permission::create(["name"=>"Delete-Setting","guard_name"=>"admin"]);
        // Permission::create(["name"=>"Read-Setting","guard_name"=>"admin"]);

        Permission::create(["name"=>"Create-Notifcation","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-Notifcation","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-Notifcation","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-Notifcation","guard_name"=>"admin"]);



        /*

        Permission::create(["name"=>"Create-","guard_name"=>"admin"]);
        Permission::create(["name"=>"Update-","guard_name"=>"admin"]);
        Permission::create(["name"=>"Delete-","guard_name"=>"admin"]);
        Permission::create(["name"=>"Read-","guard_name"=>"admin"]);

        */
    }
}
