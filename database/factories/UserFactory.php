<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'avater' => $this->faker->imageUrl,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'os_mobile' => "Android",
            'ip_address' => $this->faker->ipv4,
            'is_online' => $this->faker->boolean(),
            'status' => "active",
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'fname' => $this->faker->firstName(),
                'lname' => $this->faker->lastName(),
                'avater' => $this->faker->imageUrl(),
                'fname' => $this->faker->firstName(),
                'email' => $this->faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'os_mobile' => "Android",
                'ip_address' => $this->faker->ipv4(),
                'status' => 'active',
                'fname' => $this->faker->firstName(),
                'remember_token' => Str::random(10),
            ];
        });
    }
}
