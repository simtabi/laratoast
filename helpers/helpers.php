<?php

use Simtabi\Laratoast\Helpers\LaratoastHelper;
use Simtabi\Laratoast\Services\FlashNotifier;

if (!function_exists('laratoastFlashNotifier')) {
    function laratoastFlashNotifier(string $text, string $level = self::LEVEL_MESSAGE)
    {
      return FlashNotifier::make($text, $level);
    }
}