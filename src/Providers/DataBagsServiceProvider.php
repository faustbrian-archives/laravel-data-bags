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

namespace Konceiver\DataBags\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Konceiver\DataBags\View\Components\DataBag;

class DataBagsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::component('data-bag', DataBag::class);
    }
}
