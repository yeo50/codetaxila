<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fname' => fake()->firstName(),
            'lname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'dob' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'guardian_id' => fake()->unique()->numberBetween(0, 100),
        ];
    }
}
