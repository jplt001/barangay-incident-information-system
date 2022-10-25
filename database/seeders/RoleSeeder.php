<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdminRole = Role::create([
            "name"=>"super-admin",
            "guard_name"=> "web"
        ]);
        $adminRole = Role::create([
            "name"=>"admin",
            "guard_name"=> "web"
        ]);
        $ownerRole = Role::create([
            "name"=>"owner",
            "guard_name"=> "web"
        ]);
        $ownerRole = Role::create([
            "name"=>"tanod",
            "guard_name"=> "web"
        ]);
        $userAdminRole = Role::create([
            "name"=>"resident",
            "guard_name"=> "web"
        ]);
    }
}
