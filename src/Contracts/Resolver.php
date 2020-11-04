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

namespace Konceiver\DataBags\Contracts;

interface Resolver
{
    /**
     * @return mixed
     */
    public function resolve(array $bags, string $key);
}
