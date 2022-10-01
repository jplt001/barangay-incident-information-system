<?php

namespace Database\Seeders;

use App\Models\IncidentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentType::create([
            IncidentType::FIELD_NAME=> "Worker injury incident",
            IncidentType::FIELD_DESCRIPTION=> "Worker injury incident",
        ]);
        IncidentType::create([
            IncidentType::FIELD_NAME=> "Environmental incident",
            IncidentType::FIELD_DESCRIPTION=> "Environmental incident",
        ]);
        IncidentType::create([
            IncidentType::FIELD_NAME=> "Property damage incident",
            IncidentType::FIELD_DESCRIPTION=> "Property damage incident",
        ]);
        IncidentType::create([
            IncidentType::FIELD_NAME=> "Vehicle incident",
            IncidentType::FIELD_DESCRIPTION=> "Vehicle incident",
        ]);
        IncidentType::create([
            IncidentType::FIELD_NAME=> "Fire incident",
            IncidentType::FIELD_DESCRIPTION=> "Fire incident",
        ]);
    }
}
