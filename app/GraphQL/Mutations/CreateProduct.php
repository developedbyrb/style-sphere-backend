<?php

namespace App\GraphQL\Mutations;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CreateProduct
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, $context)
    {
        try {
            $args['created_by'] = $context->user()->id;
            $args['is_in_stock'] = $args['current_stock_qty'] > 1 ? 1 : 0;
            $args['is_in_low_stock'] = 0;

            return Product::create($args);
        } catch (\Exception $e) {
            Log::error('GraphQL Error: ' . $e->getMessage());
        }
    }
}
