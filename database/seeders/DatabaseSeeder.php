<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'alanmox441@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('M@j@liw@s@id9090'),
                'role' => 'admin',
            ]
        );

        \App\Models\User::firstOrCreate(
            ['email' => 'employer@demo.com'],
            [
                'name' => 'Demo Employer',
                'password' => bcrypt('password'),
                'role' => 'user',
            ]
        );

        \App\Models\Category::firstOrCreate(['name' => 'Information Technology']);
        \App\Models\Category::firstOrCreate(['name' => 'Finance & Accounting']);
        \App\Models\Category::firstOrCreate(['name' => 'Marketing & Sales']);
        \App\Models\Category::firstOrCreate(['name' => 'Healthcare & Medical']);
        \App\Models\Category::firstOrCreate(['name' => 'Education & Training']);
        \App\Models\Category::firstOrCreate(['name' => 'Engineering']);
        \App\Models\Category::firstOrCreate(['name' => 'Design & Creative']);
        \App\Models\Category::firstOrCreate(['name' => 'Human Resources']);

        \App\Models\JobType::firstOrCreate(['name' => 'Full Time']);
        \App\Models\JobType::firstOrCreate(['name' => 'Part Time']);
        \App\Models\JobType::firstOrCreate(['name' => 'Contract']);
        \App\Models\JobType::firstOrCreate(['name' => 'Freelance']);
        \App\Models\JobType::firstOrCreate(['name' => 'Internship']);

        if (\App\Models\Job::count() === 0) {
            \App\Models\Job::factory(20)->create([
                'user_id' => 1,
                'status' => 1,
                'isFeatured' => 1,
            ]);
            \App\Models\Job::factory(10)->create([
                'user_id' => 1,
                'status' => 1,
                'isFeatured' => 0,
            ]);
        }
    }
}
