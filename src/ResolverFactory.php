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

namespace Konceiver\DataBags;

use InvalidArgumentException;

final class ResolverFactory
{
    /**
     * @return mixed
     */
    public static function make(string $resolver, string $key)
    {
        if ($resolver === 'controller') {
            return DataBag::resolveByController($key);
        }

        if ($resolver === 'domain') {
            return DataBag::resolveByDomain($key);
        }

        if ($resolver === 'name') {
            return DataBag::resolveByName($key);
        }

        if ($resolver === 'path') {
            return DataBag::resolveByPath($key);
        }

        if ($resolver === 'glob') {
            return DataBag::resolveByGlob($key);
        }

        throw new InvalidArgumentException("Failed to find a resolver for [$resolver]");
    }
}
