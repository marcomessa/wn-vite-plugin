<?php

namespace Marcomessa\Vite\Facades;

use Winter\Storm\Support\Facade;

class Vite extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'vite';
    }
}
