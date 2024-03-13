<?php

namespace App\GraphQL\Mutations;

use App\Models\Cart;
use GraphQL\Error\Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartResolver
{
    /** @param  array{}  $args */
    public function create($root, array $args)
    {
        try {
            $cartData = Cart::where('user_id', Auth::id())
                ->where('product_id', $args['product'])
                ->where('shop_id', $args['shop'])
                ->first();

            if ($cartData) {
                $updatedQuantity = $cartData->qty + $args['qty'];
                $totalAmount = $updatedQuantity * $cartData->price;
                $cartData->update([
                    'qty' => $updatedQuantity,
                    'total_amount' => $totalAmount
                ]);
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $args['product'],
                    'shop_id' => $args['shop'],
                    'qty' => $args['qty'],
                    'price' => $args['price'],
                    'total_amount' => $args['qty'] * $args['price']
                ]);
            }

            return [
                'cartCount' => Cart::where('user_id', Auth::id())->sum('qty')
            ];
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /** @param array{} $args */
    public function update($root, array $args)
    {
        try {
            $cartDetails = Cart::find($args['id']);
            $totalAmount =  $args['qty'] * $cartDetails->price;
            if ($cartDetails) {
                $cartDetails->update([
                    'qty' => $args['qty'],
                    'total_amount' => $totalAmount
                ]);

                return [
                    'cartCount' => Cart::where('user_id', Auth::id())->sum('qty')
                ];
            } else {
                throw new Error('Cart Details not found for given id.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function remove($root, array $args)
    {
        try {
            $cartDetails = Cart::find($args['id']);
            if ($cartDetails) {
                $cartDetails->delete();

                return [
                    'cartCount' => Cart::where('user_id', Auth::id())->sum('qty')
                ];
            } else {
                throw new Error('Cart Details not found for given id.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
