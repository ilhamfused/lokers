<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title =  'Dibutuhkan ' . $this->faker->jobTitle();
        $job_description = collect($this->faker->paragraphs(mt_rand(5, 10)))->map(
            fn ($p) => "<p>$p</p>"
        )->implode('');
        $excerpt = Str::limit(strip_tags($job_description), 200, '...');
        return [
            // 'company' => $this->faker->unique()->company(),
            'title' => $title,
            'slug' => Str::slug($title),
            'job_description' => $job_description,
            'excerpt' => $excerpt,
            'job_location' => $this->faker->city(),
            'job_type_id' => mt_rand(1, 30),
            'created_at' => $this->faker->dateTimeBetween('-14 days', '-2 days')
        ];
    }
}
