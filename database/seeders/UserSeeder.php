<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            'credentials' => '1000851592',
            'name' => 'Andres David',
            'last_name' => 'Arregoces Cuero',
            'email' => 'a.arregoces35@gmail.com',
            'password' => bcrypt('Andres.02')

        ]);
    }
}
