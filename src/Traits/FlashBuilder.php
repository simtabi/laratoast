<?php

namespace Simtabi\Laratoast\Traits;

use Simtabi\Laratoast\Helpers\LaratoastHelper;
use Simtabi\Laratoast\Services\FlashNotifier;

trait FlashBuilder
{

    public function fireFlashMessage(): FlashNotifier
    {

        $notifier = app(LaratoastHelper::getFlashSingletonName());

        if (! is_null($message)) {
            return $notifier->message($message, $level);
        }

        return $notifier;

        return app(LaratoastHelper::getFlashSingletonName());
    }

}
