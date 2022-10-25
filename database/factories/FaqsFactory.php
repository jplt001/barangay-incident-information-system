<?php

namespace Database\Factories;

use App\Models\Faqs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faqs>
 */
class FaqsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Faqs::FIELD_QUESTION=> fake()->realText(100),
            Faqs::FIELD_ANSWER=> fake()->realText(100),
        ];
    }
}
