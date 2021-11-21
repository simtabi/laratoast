<?php

namespace Simtabi\Laratoast\Traits;

use Simtabi\Laratoast\Helpers\LaratoastHelper;
use Simtabi\Laratoast\Services\FlashNotifier;

trait FlashBuilder
{

    function fireFlashMessage($message = null, string $level = LaratoastHelper::MESSAGE_TYPE_INFO): FlashNotifier
    {

        $notifier = app(LaratoastHelper::getFlashFacadeName());

        if (! is_null($message)) {
            return $notifier->message($message, $level);
        }

        return $notifier;
    }

}
