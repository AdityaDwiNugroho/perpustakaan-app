<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory()
            ->count(5)
            ->hasBooks(10)
            ->create();

        // Create 8 Categories
        $categories = Category::factory()->count(9)->create();

        Book::all()->each(function ($book) use ($categories) {
            $book->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
