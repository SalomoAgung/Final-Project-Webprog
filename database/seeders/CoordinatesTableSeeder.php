<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;
use App\Models\Coordinate;

class CoordinatesTableSeeder extends Seeder
{
    public function run()
    {
        $routes = [
            [
                'name' => 'Plaza Araya - Jl. Ijen',
                'coordinates' => [
                    ['latitude' => -7.9564, 'longitude' => 112.6372],
                    ['latitude' => -7.9778, 'longitude' => 112.6265],
                ]
            ],
            [
                'name' => 'BINUS @Malang - Stasiun Malang Baru',
                'coordinates' => [
                    ['latitude' => -7.9585, 'longitude' => 112.6169],
                    ['latitude' => -7.9666, 'longitude' => 112.6347],
                ]
            ],
            [
                'name' => 'Museum Angkut - Jatim Park 1',
                'coordinates' => [
                    ['latitude' => -7.8818, 'longitude' => 112.5286],
                    ['latitude' => -7.8850, 'longitude' => 112.5294],
                ]
            ]
        ];

        foreach ($routes as $routeData) {
            $route = Route::firstOrCreate(['name' => $routeData['name']], ['tariff' => 15.00]);

            foreach ($routeData['coordinates'] as $coordinate) {
                Coordinate::create([
                    'route_id' => $route->id,
                    'latitude' => $coordinate['latitude'],
                    'longitude' => $coordinate['longitude']
                ]);
            }
        }
    }
}
