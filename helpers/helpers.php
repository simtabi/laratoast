<?php

use Simtabi\Laratoast\Helpers\LaratoastHelper;

use Simtabi\Laratoast\Message;
use Illuminate\Support\Str;

if (!function_exists('session_message')) {
    /**
     * Flash a message to the session.
     *
     * @param Message $message
     * @param string                                $bag
     *
     * @return void
     */
    function session_message(Message $message, string $bag = 'default')
    {
        // This is added as a helper function simply because \Illuminate\Session\Store is not Macroable
        session()->flash(config('laratoast.flashit.session_flash').'.'.$bag.'.'.Str::orderedUuid(), $message);

        // Note that we are using ordered uuid as keys and flashing each message individually to the storage instead of
        // flashing the entire ViewFlashMessageBag object. This is because flashing the entire object will require
        // fetching it from session, adding new messages and re-flashing. During this process any already flashed
        // messages will be re-flashed and hence be shown for an "extra" request.
        // Despite this "bug" this is how Laravel does it with errors. I expect this can cause problems especially
        // when being used in Livewire. See https://github.com/laravel/framework/blob/master/src/Illuminate/Http/RedirectResponse.php#L131
        /*
        $messages = session()->get(config('laratoast.flashit.session_flash'), new \Simtabi\Laratoast\ViewFlashMessageBag());

        if (! $messages instanceof \Simtabi\Laratoast\ViewFlashMessageBag) {
            $messages = new \Simtabi\Laratoast\ViewFlashMessageBag;
        }

        session()->flash(config('laratoast.flashit.session_flash'), $messages->push($message, $bag));
        */
    }
}
