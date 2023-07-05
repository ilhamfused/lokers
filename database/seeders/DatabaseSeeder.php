<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\JobPost;
use App\Models\JobType;
use App\Models\Education;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;
use App\Models\JobseekerProfile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $education_level = ['sd', 'smp', 'sma/smk', 'd1', 'd2', 'd3', 's1/d4', 's2', 's3'];
        $education_slug = ['sd', 'smp', 'sma-smk', 'd1', 'd2', 'd3', 's1-d4', 's2', 's3'];

        $roles = ['admin', 'company', 'jobseeker'];
        // \App\Models\User::factory(10)->create();


        for ($i = 0; $i <= count($roles) - 1; $i++) {
            Role::create([
                'name' => $roles[$i],
            ]);
        }

        for ($i = 0; $i <= count($education_level) - 1; $i++) {
            Education::create([
                'name' => $education_level[$i],
                'slug' => $education_slug[$i]
            ]);
        }

        JobType::factory(80)->create();

        User::factory(10)->create([
            'role_id' => 2,
        ])->each(function ($user) {
            CompanyProfile::factory(1)->create([
                'user_id' => $user->id
            ]);
        })->each(
            fn ($user) =>
            JobPost::factory(mt_rand(3, 7))->create([
                'user_id' => $user->id,
                'education_id' => mt_rand(1, count($education_level)),
            ])
        );

        User::factory(10)->create([
            'role_id' => 3,
        ])->each(
            fn ($user) =>
            JobseekerProfile::factory(1)->create([
                'user_id' => $user->id,
                'education_id' => mt_rand(1, count($education_level)),
            ])
        );
    }
}
