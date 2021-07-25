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

namespace Konceiver\DataBags\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use Konceiver\DataBags\ResolverFactory;

final class DataBag extends Component
{
    private string $key;

    private string $resolver;

    private string $view;

    public function __construct(string $key, string $resolver, string $view)
    {
        $this->key      = $key;
        $this->resolver = $resolver;
        $this->view     = $view;
    }

    public function render(): \Illuminate\View\View
    {
        return View::make($this->view, ResolverFactory::make($this->resolver, $this->key));
    }
}
