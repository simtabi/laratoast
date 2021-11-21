<?php

namespace Simtabi\Laratoast\Traits;

use Simtabi\Laratoast\Helpers\LaratoastHelper;
use Simtabi\Laratoast\Services\FlashNotifier;

trait FlashBuilder
{

    public function fireFlashMessage(): FlashNotifier
    {
        return app(LaratoastHelper::getFlashSingletonName());
    }

}
