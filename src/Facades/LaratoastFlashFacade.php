<?php

namespace Simtabi\Laratoast\Facades;

use Illuminate\Support\Facades\Facade;
use Simtabi\Laratoast\Helpers\LaratoastHelper;

class LaratoastFlashFacade extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LaratoastHelper::getFlashFacadeName();
    }
}
