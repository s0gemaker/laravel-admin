<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
//    protected $model = \App\Models\User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    #[ArrayShape(['first_name' => "string", 'last_name' => "string", 'email' => "string", 'password' => "string"])] public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }}


