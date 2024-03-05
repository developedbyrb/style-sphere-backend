<?php

namespace App\GraphQL\Mutations;

use App\Models\Category;
use Illuminate\Support\Facades\Log;

class UpdateCategory
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        try {
            $categoryData = Category::find($args['id']);
            if ($categoryData) {
                $categoryData->update([
                    'name' => $args['name'],
                    'code' => $args['code'],
                    'price_start_from' => $args['price_start_from'],
                    'price_end_to' => $args['price_end_to'],
                    'status' => $args['status']
                ]);
            }

            return $categoryData;
        } catch (\Exception $e) {
            Log::error('GraphQL Error: ' . $e->getMessage());
        }
    }
}
