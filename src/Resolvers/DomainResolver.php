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

namespace Konceiver\DataBags\Resolvers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Konceiver\DataBags\Contracts\Resolver;

class DomainResolver implements Resolver
{
    public function resolve(array $bags, string $key)
    {
        $path = Route::current()->getDomain();

        if (! empty($bags[$key][$path])) {
            return $bags[$key][$path];
        }

        return Arr::get($bags, "$key.*");
    }
}
