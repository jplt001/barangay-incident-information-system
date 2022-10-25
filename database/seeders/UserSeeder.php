<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            User::FIELD_FIRST_NAME=> "Joseph Patrick",
            User::FIELD_LAST_NAME=> "Timcang",
            User::FIELD_MIDDLE_NAME=> "Lagonoy",
            User::FIELD_EMAIL=>"jpltimcang.developer001@gmail.com",
            User::FIELD_PASSWORD=> Hash::make("123123"),
            User::FIELD_ROLE=> "super-admin"
            
        ]);

        $superAdmin->assignRole('super-admin');

        $superAdmin = User::create([
            User::FIELD_FIRST_NAME=> "Vanessa Kyl",
            User::FIELD_LAST_NAME=> "Timcang",
            User::FIELD_MIDDLE_NAME=> "Vareja",
            User::FIELD_EMAIL=>"vktimcang@gmail.com",
            User::FIELD_PASSWORD=> Hash::make("123123"),
            User::FIELD_ROLE=> "owner",
            User::FIELD_BARANGAY_ID=> 1
            
        ]);

        $superAdmin->assignRole('owner');
    }
}
