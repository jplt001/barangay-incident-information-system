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
            "display_name"=> "Super Admin",
            "guard_name"=> "web",
        ]);
        $adminRole = Role::create([
            "name"=>"admin",
            "display_name" => "Administrator",
            "guard_name"=> "web",
        ]);
        $ownerRole = Role::create([
            "name"=>"owner",
            "display_name" => "Owner",
            "guard_name"=> "web",
            "barangay_id" => 0,
        ]);
        $ownerRole = Role::create([
            "name"=>"tanod",
            "display_name" => "Barangay Tanod",
            "guard_name"=> "web",
            "barangay_id" => 0,
        ]);
        $userAdminRole = Role::create([
            "name"=>"resident",
            "display_name" => "Resident",
            "guard_name"=> "web",
            "barangay_id"=> 0,
        ]);
    }
}
