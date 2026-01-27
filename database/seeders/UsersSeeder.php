<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Shelsy Garcia',
                'email' => 'shelg@example.com',
                'password' => Hash::make('password'),
                'city_id' => 1,
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'city_id' => 2,
            ],
            [
                'name' => 'Jim Doe',
                'email' => 'jim@example.com',
                'password' => Hash::make('password'),
                'city_id' => 3,
            ],
            [
                'name' => 'Jill Doe',
                'email' => 'jill@example.com',
                'password' => Hash::make('password'),
                'city_id' => 4,
            ],
            [
                'name' => 'Jack Doe',
                'email' => 'jack@example.com',
                'password' => Hash::make('password'),
                'city_id' => 5,
            ],
            [
                'name' => 'Jull Doe',
                'email' => 'jull@example.com',
                'password' => Hash::make('password'),
                'city_id' => 6,
            ],
            [
                'name' => 'Juck Doe',
                'email' => 'juck@example.com',
                'password' => Hash::make('password'),
                'city_id' => 7,
            ],
            [
                'name' => 'Jillu Doe',
                'email' => 'jillu@example.com',
                'password' => Hash::make('password'),
                'city_id' => 8,
            ],
            [
                'name' => 'Jacki Doe',
                'email' => 'jacki@example.com',
                'password' => Hash::make('password'),
                'city_id' => 9,
            ],
            [
                'name' => 'Jillie Doe',
                'email' => 'jillie@example.com',
                'password' => Hash::make('password'),
                'city_id' => 10,
            ],
            [
                'name' => 'Jackie Doe',
                'email' => 'jackie@example.com',
                'password' => Hash::make('password'),
                'city_id' => 11,
            ],
            [
                'name' => 'Soph Doe',
                'email' => 'soph@example.com',
                'password' => Hash::make('password'),
                'city_id' => 12,
            ],
            [
                'name' => 'Sophie Doe',
                'email' => 'sophie@example.com',
                'password' => Hash::make('password'),
                'city_id' => 13,
            ],
            [
                'name' => 'Jillia Doe',
                'email' => 'jillia@example.com',
                'password' => Hash::make('password'),
                'city_id' => 14,
            ],
            [
                'name' => 'Emily Doe',
                'email' => 'emily@example.com',
                'password' => Hash::make('password'),
                'city_id' => 15,
            ],
            [
                'name' => 'Emma Doe',
                'email' => 'emma@example.com',
                'password' => Hash::make('password'),
                'city_id' => 16,
            ],
            [
                'name' => 'Lucas Doe',
                'email' => 'lucas@example.com',
                'password' => Hash::make('password'),
                'city_id' => 17,
            ],
            [
                'name' => 'Oliver Doe',
                'email' => 'oliver@example.com',
                'password' => Hash::make('password'),
                'city_id' => 18,
            ],
            [
                'name' => 'Sara Doe',
                'email' => 'sara@example.com',
                'password' => Hash::make('password'),
                'city_id' => 19,
            ],
            [
                'name' => 'Tom Doe',
                'email' => 'tom@example.com',
                'password' => Hash::make('password'),
                'city_id' => 20,
            ],
            [
                'name' => 'Mia Doe',
                'email' => 'mia@example.com',
                'password' => Hash::make('password'),
                'city_id' => 21,
            ],
            [
                'name' => 'Liam Doe',
                'email' => 'liam@example.com',
                'password' => Hash::make('password'),
                'city_id' => 22,
            ],
            [
                'name' => 'Noah Doe',
                'email' => 'noah@example.com',
                'password' => Hash::make('password'),
                'city_id' => 23,
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'city_id' => $user['city_id'],
            ]);
        }
    }
}
