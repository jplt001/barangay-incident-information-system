<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            User::FIELD_EMAIL=> "super.admin@biis.com",
            User::FIELD_FIRST_NAME=> "Super",
            User::FIELD_LAST_NAME=> "Administrator",
            User::FIELD_PASSWORD=> bcrypt("123123"),
            User::FIELD_USER_TYPE=> "super-admin",
        ]);

        User::create([
            User::FIELD_EMAIL=> "admin@biis.com",
            User::FIELD_FIRST_NAME => "Admin",
            User::FIELD_LAST_NAME => "User",
            User::FIELD_PASSWORD=> bcrypt("123123"),
            User::FIELD_USER_TYPE=> "admin",
        ]);
    }
}
