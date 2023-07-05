<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use TaylorNetwork\UsernameGenerator\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;
use TaylorNetwork\UsernameGenerator\Facades\UsernameGenerator;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        // $generator = new Generator();
        // $username = $generator->generate($name);
        // $username = UsernameGenerator::setConfig(['case' => 'studly', 'max_length' => 12])->generate($name);
        return [
            // 'name' => $name,
            // 'username' => $username,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
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
                'email_verified_at' => null,
            ];
        });
    }
}
