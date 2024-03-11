<?php

namespace App\GraphQL\Mutations;

use App\Models\Shop;
use App\Models\ShopAddress;
use App\Models\ShopProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ShopResolver
{
    public function create($root, array $args)
    {
        try {
            $generalDetails = $args['generalDetails'];
            $addressDetails = $args['addressDetails'];
            $productDetails = $args['productDetails'];

            if (isset($generalDetails)) {
                $shop = Shop::create([
                    'name' =>  $generalDetails['name'],
                    'email' => $generalDetails['email'],
                    'website' => $generalDetails['website'],
                    'mobile_number' => $generalDetails['number'],
                    'description' => $generalDetails['description'],
                    'status' => 'active',
                    'created_by' => Auth::id()
                ]);

                if ($shop && count($addressDetails) > 0) {
                    foreach ($addressDetails as $value) {
                        ShopAddress::create([
                            'shop_id' => $shop->id,
                            'address_line_1' => $value['address_1'],
                            'address_line_2' => $value['address_2'],
                            'city_id' => $value['city'],
                            'state_id' => $value['state'],
                            'country_id' => $value['country'],
                        ]);
                    }
                }

                if ($shop && count($productDetails) > 0) {
                    foreach ($productDetails as $value) {
                        ShopProduct::create([
                            'shop_id' => $shop->id,
                            'product_id' => $value['product'],
                            'selling_price' => $value['price'],
                            'available_qty' => $value['stock']
                        ]);
                    }
                }

                return $shop;
            }
        } catch (\Exception $e) {
            Log::error('GraphQL Error: ' . $e->getMessage());
        }
    }
}
