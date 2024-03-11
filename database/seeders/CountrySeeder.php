<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // import records of countries
        $jsonContent = Storage::get('geoLocations/countries.json');
        $data = json_decode($jsonContent, true);
        foreach ($data['countries'] as $value) {
            Country::create([
                'name' => $value['name'],
                'short_name' => $value['sortName'],
                'phone_code' => $value['phoneCode']
            ]);
        }
    }
}
