<?php

use Simtabi\Laratoast\Services\FlashNotifier;

if (! function_exists('laratoastFlashNotifier')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return FlashNotifier
     */
    function laratoastFlashNotifier($message = null, $level = 'info'): FlashNotifier
    {

        $notifier = app(LaratoastHelper::getFlashSingletonName());

        if (! is_null($message)) {
            return $notifier->message($message, $level);
        }

        return $notifier;
    }

}
