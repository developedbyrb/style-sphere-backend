<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final readonly class CreateUser
{
    /**
     * @param  array{}  $args
     */
    public function __invoke(array $args)
    {
        /**
         * @var \Illuminate\Http\UploadedFile $file
         */
        $file = $args['profile_pic'];

        // Store the file in the 'uploads' directory and return the path
        $path = $file->storePublicly('public/uploads/users');

        return User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
            'role_id' => $args['role_id'],
            'profile_pic' => $path
        ]);
    }
}
