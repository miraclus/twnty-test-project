<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'age' => fake()->numberBetween(18, 65),
            'country_id' => Country::inRandomOrder()->first(),
            'email' => fake()->unique()->safeEmail(),
            'salary' => fake()->numberBetween(1000, 10000),
            'position' => fake()->jobTitle(),
        ];
    }
}
