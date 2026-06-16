<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
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
    }
}
