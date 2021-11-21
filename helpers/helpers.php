<?php

use Simtabi\Laratoast\Services\FlashNotifier;
use Simtabi\Laratoast\Helpers\LaratoastHelper;

if (! function_exists('laratoastFlash')) {

    /**
     * Arrange for a flash message.
     *
     * @return FlashNotifier
     */
    function laratoastFlash(): FlashNotifier
    {
        return app(LaratoastHelper::getFlashSingletonName());
    }

}
