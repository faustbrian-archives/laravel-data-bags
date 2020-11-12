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
use Illuminate\Support\Facades\Request;
use Konceiver\DataBags\Contracts\Resolver;
use Spatie\Regex\Regex;

class RegexResolver implements Resolver
{
    public function resolve(array $bags, string $key)
    {
        $bag      = Arr::get($bags, $key);
        $subjects = array_keys($bag);

        foreach ($subjects as $subject) {
            if (Regex::match($subject, Request::path())->hasMatch()) {
                return $bag[$subject];
            }
        }
    }
}
