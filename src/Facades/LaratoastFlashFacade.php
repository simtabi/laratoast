<?php

namespace Simtabi\Laratoast\Facades;

use Illuminate\Support\Facades\Facade;
use Simtabi\Laratoast\Services\FlashNotifier;

class LaratoastFlashFacade extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FlashNotifier::class;
    }
}
