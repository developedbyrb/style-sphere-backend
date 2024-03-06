<?php

namespace App\GraphQL\Mutations;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class UpdateProduct
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        try {
            $productData = Product::find($args['id']);
            if ($productData) {
                $productData->update($args);
            }

            return $productData;
        } catch (\Exception $e) {
            Log::error('GraphQL Error: ' . $e->getMessage());
        }
    }
}
