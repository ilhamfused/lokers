<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use TaylorNetwork\UsernameGenerator\Facades\UsernameGenerator;

class JobseekerProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();
        $username = UsernameGenerator::setConfig(['case' => 'studly', 'max_length' => 12])->generate($name);
        return [
            //
            'name' => $name,
            'username' => $username,
            'about' => collect($this->faker->paragraphs(mt_rand(5, 8)))->map(
                fn ($p) => "$p"
            )->implode(''),
            'skill_set' => collect($this->faker->words(mt_rand(1, 5)))->map(
                fn ($p) => "$p"
            )->implode(', '),
            'location' => $this->faker->city(),
            'date_of_birth' => $this->faker->dateTimeBetween('-50 years', '-10 years'),
        ];
    }
}
