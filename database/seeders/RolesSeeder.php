<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appRoles = config('constants.APP_ROLES');
        foreach ($appRoles as $value) {
            Role::create([
                'name' => $value
            ]);
        }
    }
}
