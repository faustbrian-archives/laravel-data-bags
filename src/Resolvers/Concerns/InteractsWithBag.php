<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Data Bags.
 *
 * (c) Konceiver Oy <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\DataBags\Resolvers\Concerns;

use Illuminate\Support\Arr;

trait InteractsWithBag
{
    private function resolveFromBag(array $bags, string $key, string $path)
    {
        if (Arr::has($bags, "$key.$path")) {
            return Arr::get($bags, "$key.$path");
        }

        return Arr::get($bags, "$key.*");
    }
}
