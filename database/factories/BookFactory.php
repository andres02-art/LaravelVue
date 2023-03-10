<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's foreing id state.
     *
     * * @param class $author App\Models\Author.php
     * * @param class $category App\Models\Category.php
     * @return method state
     */
    public function foreingId($author, $category)
    {
        return $this->state([
            'author_id' => $author->id,
            'category_id' => $category->id,
        ]);
    }
    /**
     * Define the model's default state.
     *
     * * @param class $author App\Models\Author.php
     * * @param class $category App\Models\Category.php
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'title' => fake()->title(),
            'stock' => fake()->randomDigit(),
            'description' => fake()->text()
        ];
    }
}
