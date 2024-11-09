<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'title' => fake()->jobTitle(),
            'employer_id' => Employer::factory(), // It will create a new employer each time a job is created.
            'salary' => '$'.fake()->numberBetween(10, 90).',000',
        ];
    }
}
