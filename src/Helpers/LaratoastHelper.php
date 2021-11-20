<?php

namespace Simtabi\Laratoast\Helpers;

use Illuminate\Support\Str;
use Simtabi\Laratoast\Services\FlashNotifier;

class LaratoastHelper
{

    public const LARATOAST_FLASH_SINGLETON_NAME = 'laratoast-flash';
    public const LARATOAST_FLASH_SESSION_NAME   = 'laratoast_flash_messages';
    public const LARATOAST_SESSION_NAME         = 'laratoast';

    public static function kebabCase($string)
    {
        return Str::of($string)->kebab();
    }

    public static function getFlashSingletonName(): string
    {
        return self::LARATOAST_FLASH_SINGLETON_NAME;
    }

    public static function getFlashSessionName(): string
    {
        return self::LARATOAST_FLASH_SESSION_NAME;
    }

    public static function getSessionName(): string
    {
        return self::LARATOAST_SESSION_NAME;
    }

}
