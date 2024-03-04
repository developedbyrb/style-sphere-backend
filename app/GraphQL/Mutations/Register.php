<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\GraphQL\Validators\UserRegisterInputValidator;
use Nuwave\Lighthouse\Exceptions\ValidationException;

final class Register
{
    /** @param  array{}  $args */
    public function register(array $args)
    {
        return $args;
    }
}
