<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // user 10 , 1 -> blog 3 , blogs -> 30, users -> 10

        User::factory(10)
            ->has(Blog::factory()->count(3), 'blogs')
            ->create();
    }
}
