<?php

namespace Simtabi\Laratoast\Helpers;

use Illuminate\Support\Str;
use Simtabi\Laratoast\Services\FlashNotifier;

class LaratoastHelper
{

    public const LARATOAST_FLASH_SINGLETON_NAME = 'laratoast-flash';
    public const LARATOAST_FLASH_SESSION_NAME   = 'laratoast_flash_messages';
    public const LARATOAST_SESSION_NAME         = 'laratoast';

    public const MESSAGE_TYPE_INFO    = 'info';
    public const MESSAGE_TYPE_SUCCESS = 'success';
    public const MESSAGE_TYPE_DANGER  = 'danger';
    public const MESSAGE_TYPE_WARNING = 'warning';

    public static function getFlashFacadeName(): string
    {
        return self::LARATOAST_FLASH_SINGLETON_NAME;
    }

    public static function getFlashSessionName(): string
    {
        return self::getConfig('session_flash');
    }

    public static function getConfig($key = '')
    {
        return config('laratoast.flashit' . (!empty($key) ? ".$key" : ''));
    }

    public static function kebabCase($string)
    {
        return Str::of($string)->kebab();
    }

}
