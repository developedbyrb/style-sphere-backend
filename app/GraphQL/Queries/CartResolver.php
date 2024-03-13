<?php

namespace App\GraphQL\Queries;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartResolver
{
    /** @param  array{}  $args */
    public function getCartCount($root, array $args)
    {
        return [
            'cartCount' => Cart::where('user_id', Auth::id())->sum('qty')
        ];
    }

    public function cartItems()
    {
        return Cart::with(['user', 'product', 'shop'])->where('user_id', Auth::id())->get();
    }
}
