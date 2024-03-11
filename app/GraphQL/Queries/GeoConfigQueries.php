<?php

namespace App\GraphQL\Queries;

use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Log;

class GeoConfigQueries
{
    public function stateByCountryId($root, array $args)
    {
        $countryId = $args['countryId'];

        $states = State::whereHas('country', function ($query) use ($countryId) {
            $query->where('id', $countryId);
        })->get();

        Log::info($states->count());

        return $states;
    }

    public function citiesByStateId($root, array $args)
    {
        $stateId = $args['stateId'];

        $cities = City::whereHas('state', function ($query) use ($stateId) {
            $query->where('id', $stateId);
        })->get();

        Log::info($cities->count());

        return $cities;
    }
}
