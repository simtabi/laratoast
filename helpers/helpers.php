<?php

use Simtabi\Laratoast\Services\FlashNotifier;

if (! function_exists('flash')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return FlashNotifier
     */
    function flash($message = null, $level = 'info')
    {
        $notifier = app('flash');

        if (! is_null($message)) {
            return $notifier->message($message, $level);
        }

        return $notifier;
    }

}
