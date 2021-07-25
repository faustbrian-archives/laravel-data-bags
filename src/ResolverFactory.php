<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Data Bags.
 *
 * (c) Konceiver <info@konceiver.dev>
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
        try {
            return [
                'controller'  => fn (string $key) => DataBag::resolveByController($key),
                'domain'      => fn (string $key) => DataBag::resolveByDomain($key),
                'glob'        => fn (string $key) => DataBag::resolveByGlob($key),
                'name'        => fn (string $key) => DataBag::resolveByName($key),
                'path'        => fn (string $key) => DataBag::resolveByPath($key),
                'regex'       => fn (string $key) => DataBag::resolveByRegex($key),
            ][$resolver]($key);
        } catch (\Throwable $th) {
            throw new InvalidArgumentException("Failed to find a resolver for [$resolver]");
        }
    }
}
