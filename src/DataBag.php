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

use Konceiver\DataBags\Resolvers\ControllerResolver;
use Konceiver\DataBags\Resolvers\DomainResolver;
use Konceiver\DataBags\Resolvers\GlobResolver;
use Konceiver\DataBags\Resolvers\NameResolver;
use Konceiver\DataBags\Resolvers\PathResolver;
use Konceiver\DataBags\Resolvers\RegexResolver;

final class DataBag
{
    private static array $bags = [];

    public static function register(string $key, array $data): void
    {
        static::$bags[$key] = $data;
    }

    /**
     * @return mixed
     */
    public static function resolveByController(string $key)
    {
        return (new ControllerResolver())->resolve(static::$bags, $key);
    }

    /**
     * @return mixed
     */
    public static function resolveByDomain(string $key)
    {
        return (new DomainResolver())->resolve(static::$bags, $key);
    }

    /**
     * @return mixed
     */
    public static function resolveByName(string $key)
    {
        return (new NameResolver())->resolve(static::$bags, $key);
    }

    /**
     * @return mixed
     */
    public static function resolveByPath(string $key)
    {
        return (new PathResolver())->resolve(static::$bags, $key);
    }

    /**
     * @return mixed
     */
    public static function resolveByGlob(string $key)
    {
        return (new GlobResolver())->resolve(static::$bags, $key);
    }

    /**
     * @return mixed
     */
    public static function resolveByRegex(string $key)
    {
        return (new RegexResolver())->resolve(static::$bags, $key);
    }
}
