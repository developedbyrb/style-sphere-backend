<?php

namespace App\GraphQL\Queries;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class DashboardData
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        try {
            $usersCount = User::whereNotNull('email_verified_at')->count();
            $productsCount = Product::count();
            $shopsCount = 0;
            $categoriesCount = Category::count();

            return [
                "usersCount" =>  $usersCount,
                "categoriesCount" =>  $categoriesCount,
                "productsCount" =>  $productsCount,
                "shopsCount" =>  $shopsCount,
            ];
        } catch (\Exception $e) {
            Log::error('GraphQL Error: ' . $e->getMessage());
        }
    }
}
