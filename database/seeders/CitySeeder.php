<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'SALAR DE UYUNI',
            'MONTE EVEREST',
            'CRISTO REDENTOR',
            'SAGRADA FAMILIA',
            'ACROPOLIS',
            'ARCO DEL TRIUNFO',
            'PALACIO DE VERSALLES',
            'MUSEO LOUVRE',
            'MONTE FUJI',
            'ESTATUA DE LA LIBERTAD',           
            'OPERA DE SIDNEY',
            'ISLA DE PASCUA',
            'MACHU PICHU',
            'CHICHEN ITZA',
            'TAJ MAHAL',
            'CATARATAS DEL NIAGARA',
            'BURJ KHALIFA',
            'TORRE DE PISA',
            'BIG BEN',
            'MURALLA CHINA',
            'TORRE EIFFEL',
            'COLISEO ROMANO',
            'PIRAMIDES DE GIZA',
        ];

        foreach ($cities as $cityName) {
            City::firstOrCreate(['name' => $cityName]);
        }
    }
}

