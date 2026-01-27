<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Seed cities
        $this->call(CitySeeder::class);

        // Seed users
        $this->call(UsersSeeder::class);

        // Seed city_has_city
        $this->call(CityhasCitySeeder::class);
    }
}
    