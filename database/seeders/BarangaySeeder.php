<?php

namespace Database\Seeders;

use App\Models\Barangay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barangay::create([
            Barangay::FIELD_NAME=> "Bayan Luma IV - Holiday Village",
            Barangay::FIELD_ADDRESS1=> "Bayan Luma IV, Holiday Village, Imus, Cavite",
            Barangay::FIELD_LATITUDE=> 14.416381489920044, 
            Barangay::FIELD_LONGITUDE=>120.93778641672343,
            Barangay::FIELD_SETUP_FINISHED=> 1,
        ]);
    }
}
