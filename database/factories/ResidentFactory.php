<?php

namespace Database\Factories;

use App\Models\Resident;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(["Male", "Female"]);
        return [
            Resident::FIELD_FIRST_NAME=> $this->faker->firstName($gender),
            Resident::FIELD_LAST_NAME=> $this->faker->lastName(),
            Resident::FIELD_CONTACT_NUMBER=> $this->faker->phoneNumber(),
            Resident::FIELD_ADDRESS1=> $this->faker->address(),
            Resident::FIELD_GENDER=> $gender,
            Resident::FIELD_EMAIL=> $this->faker->email(),
            Resident::FIELD_BIRTHDATE=> $this->faker->date("Y-m-d"),
        ];
    }
}
