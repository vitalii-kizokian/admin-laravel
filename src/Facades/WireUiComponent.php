<?php

namespace WireUi\Facades;

use Illuminate\Support\Facades\Facade;
use WireUi\WireUiComponentResolver;

/**
 * @method static string resolve(string $originalComponentName)
 * @method static string getComponentClass(string $originalComponentName)
 */
class WireUiComponent extends Facade
{
    protected static function getFacadeAccessor()
    {
        return WireUiComponentResolver::class;
    }
}
