<?php

namespace Database\Seeders;

use App\Models\CityHasCity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityhasCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cityHasCity = [
            ['city_id' => '21','associated_city_id' => '8'],
            ['city_id' => '22'	,'associated_city_id' => '9'],
            ['city_id' => '23'	,'associated_city_id' => '12'],
            ['city_id' => '1'	,'associated_city_id' => '14'],
            ['city_id' => '2'	,'associated_city_id' => '1'],
            ['city_id' => '3'	,'associated_city_id' => '23'],
            ['city_id' => '4'	,'associated_city_id' => '2'],
            ['city_id' => '6'	,'associated_city_id' => '16'],
            ['city_id' => '7'	,'associated_city_id' => '21'],
            ['city_id' => '11'	,'associated_city_id' => '13'],
            ['city_id' => '12'	,'associated_city_id' => '3'],
            ['city_id' => '13'	,'associated_city_id' => '4'],
            ['city_id' => '15'	,'associated_city_id' => '7'],
            ['city_id' => '16'	,'associated_city_id' => '18'],
            ['city_id' => '17'	,'associated_city_id' => '22'],
            ['city_id' => '18'	,'associated_city_id' => '15'],
            ['city_id' => '19'	,'associated_city_id' => '6'],
            ['city_id' => '5'	,'associated_city_id' => '20'],
            ['city_id' => '8'	,'associated_city_id' => '5'],
            ['city_id' => '9'	,'associated_city_id' => '19'],
            ['city_id' => '10'	,'associated_city_id' => '17'],
            ['city_id' => '14'	,'associated_city_id' => '10'],
            ['city_id' => '20'	,'associated_city_id' => '11'],

        ];

        foreach ($cityHasCity as $city) {
            CityHasCity::firstOrCreate($city);
        }
    }
}
