<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use TaylorNetwork\UsernameGenerator\Facades\UsernameGenerator;

class CompanyProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->company();
        $username = UsernameGenerator::setConfig(['case' => 'studly', 'max_length' => 12])->generate($name);
        return [
            //
            'name' => $name,
            'username' => $username,
            'description' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(
                fn ($p) => "<p>$p</p>"
            )->implode(''),
            'url' => $this->faker->url(),
            'establishment_date' => $this->faker->date('Y-m-d', 'now')
        ];
    }
}
