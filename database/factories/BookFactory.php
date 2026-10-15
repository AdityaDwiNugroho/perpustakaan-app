<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'isbn' => fake()->unique()->isbn13(),
            'published_year' => fake()->year(),
            'price' => fake()->randomFloat(50000, 500000),
            'stock' => fake()->randomBetween(1, 100),
            'author_id' => App\Models\Author::factory(),
        ];
    }
}
