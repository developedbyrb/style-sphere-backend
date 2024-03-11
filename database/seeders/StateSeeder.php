<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // import records of states
        $stateJsonContent = Storage::get('geoLocations/states.json');
        $stateData = json_decode($stateJsonContent, true);
        foreach ($stateData['states'] as $value) {
            State::create([
                'name' => $value['name'],
                'country_id' => $value['country_id']
            ]);
        }
    }
}
