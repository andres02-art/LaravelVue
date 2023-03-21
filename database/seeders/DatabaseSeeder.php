<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::findOrCreate('admin', 'web');
        Role::findOrCreate('user', 'web');

        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
        ]);

        User::find(1)->assignRole('admin');

        User::factory(100)->create();
        Author::factory(100)->create();
        Book::factory(100)->foreingId(Author::find(fake()->randomNumber(2)), Category::find(fake()->randomElement([1, 2, 3])))->create();

    }
}
