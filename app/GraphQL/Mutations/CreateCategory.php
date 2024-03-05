<?php

namespace App\GraphQL\Mutations;

use App\Models\Category;

class CreateCategory
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        /**
         * @var \Illuminate\Http\UploadedFile $file
         */
        $file = $args['image'];

        // Store the file in the 'uploads' directory and return the path
        $path = $file->storePublicly('public/uploads/categories');

        return Category::create([
            'name' => $args['name'],
            'code' => $args['code'],
            'price_start_from' => $args['price_start_from'],
            'price_end_to' => $args['price_end_to'],
            'status' => $args['status'],
            'image' => $path
        ]);
    }
}
