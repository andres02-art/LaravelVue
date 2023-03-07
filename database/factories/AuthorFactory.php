<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'biography' => fake()->paragraph()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

    /**
     */
    public function configure()
    {
        return $this->afterCreating(function (Author $author){
            Book::factory(10)->foreingId($author, Category::find(fake()->randomElement([1, 2, 3])))->create();
        });
    }
}
