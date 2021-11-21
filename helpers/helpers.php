<?php

use Simtabi\Laratoast\Services\FlashNotifier;
use Simtabi\Laratoast\Helpers\LaratoastHelper;

if (! function_exists('laratoastFlash')) {

    /**
     * Arrange for a flash message.
     *
     * @param null $message
     * @param string $level
     * @return FlashNotifier
     */
    function laratoastFlash($message = null, string $level = LaratoastHelper::MESSAGE_TYPE_INFO): FlashNotifier
    {

        $notifier = app(LaratoastHelper::getFlashFacadeName());

        if (! is_null($message)) {
            return $notifier->message($message, $level);
        }

        return $notifier;
    }

}
