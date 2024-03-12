<?php

namespace App\GraphQL\Queries;

use App\Models\Shop;
use GraphQL\Error\Error;
use Illuminate\Support\Facades\Log;

class ShopResolver
{
    public function getDetails($root, array $args)
    {
        $shopId = $args['id'];
        if ($shopId) {
            return Shop::with('products', 'addresses')->find($shopId);
        } else {
            throw new Error('Shop not found');
        }
    }
}
