<?php

namespace Simtabi\Laratoast\Facades;

use Illuminate\Support\Facades\Facade;
use Simtabi\Laratoast\Helpers\LaratoastHelper;

class LaratoastHelperFacade extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LaratoastHelper::class;
    }
}
