<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technology>
 */
class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_technology'=> fake()->unique()->words(2, true),
            'description' => fake()->sentence,
            'language' => fake()->randomElement(['Frontend', 'Backend', 'Mobile', 'Database', 'Altro']),
        ];
    }
}
