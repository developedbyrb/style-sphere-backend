<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UpdateUser
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        try {
            $userData = User::find($args['id']);
            if ($userData) {
                $userData->update($args);
            }

            return $userData;
        } catch (\Exception $e) {
            Log::error('GraphQL Error: ' . $e->getMessage());
        }
    }
}
