<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // import records of cities
        $cityJsonContent = Storage::get('geoLocations/cities.json');
        $cityData = json_decode($cityJsonContent, true);
        foreach ($cityData['cities'] as $value) {
            City::create([
                'name' => $value['name'],
                'state_id' => $value['state_id']
            ]);
        }
    }
}
