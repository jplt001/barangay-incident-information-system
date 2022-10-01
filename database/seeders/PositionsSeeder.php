<?php

namespace Database\Seeders;

use App\Models\Positions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Positions::create([
            Positions::FIELD_NAME=> "Barangay Captain",
            Positions::FIELD_LEVEL=> 0,
        ]);
        Positions::create([
            Positions::FIELD_NAME=> "Secretary",
            Positions::FIELD_LEVEL=> 1,
        ]);
        Positions::create([
            Positions::FIELD_NAME=> "Councilors",
            Positions::FIELD_LEVEL=> 2,
        ]);
        Positions::create([
            Positions::FIELD_NAME=> "BPSO (TANOD)",
            Positions::FIELD_LEVEL=> 3,
        ]);
    }
}
