<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Storage;

final readonly class GetFilePath
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        return Storage::url($args['path']);
    }
}
