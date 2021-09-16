<?php

namespace Simtabi\Laratoast\Services;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Simtabi\Laratoast\Console\InstallCommand;

class LaratoastServiceProvider extends ServiceProvider
{

    private const PATH = __DIR__ . '/../../';

    public static array $cdnAssets  = [
        'styles'  => [
        ],
        'scripts' => [
            '//cdn.jsdelivr.net/npm/sweetalert2@11'
        ],
    ];
    public static array $assets = [
        'styles'  => 'jquery.toast.css',
        'scripts' => 'jquery.toast.js',
    ];


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [InstallCommand::class];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // merge configurations
        $this->mergeConfigFrom(self::PATH .'config/laratoast.php', 'laratoast');

        // load views
        $this->loadViewsFrom(self::PATH . 'resources/views', 'laratoast');

        $this->registerDirectives();
        $this->registerPublishables();

        if ( $this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }


    private function registerPublishables(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::PATH . 'config/laratoast.php' => config_path('laratoast.php'),
            ], 'laratoast-config');

            $this->publishes([
                self::PATH . 'public'               => public_path('vendor/laratoast'),
            ], 'laratoast-assets');

            $this->publishes([
                self::PATH . 'resources/views'      => resource_path('views/vendor/laratoast'),
            ], 'laratoast-views');
        }
    }


    private function registerDirectives()
    {
        // inject required javascript
        Blade::include('laratoast::scripts', 'laratoastInitScripts');

        Blade::directive('laratoastStyles', function () {
            $styles  = $this->getComponentCdnStyles();
            $styles .= $this->getComponentStyles();
            return $styles;
        });

        Blade::directive('laratoastScripts', function () {
            $scripts  = $this->getComponentCdnScripts();
            $scripts .= $this->getComponentScripts();
            return $scripts;
        });
    }

    private function getComponentStyles()
    {
        $styles = self::$assets['styles'] ?? [];

        if (is_array($styles) && (count($styles) >= 1)) {

            return collect($styles)->map(function($item) {
                return asset("/vendor/laratoast/css/{$item}");
            })->flatten()->map(function($styleUrl) {
                return '<link media="all" type="text/css" rel="stylesheet" href="' . $styleUrl . '">';
            })->implode(PHP_EOL);
        }

        return false;
    }

    private function getComponentScripts()
    {
        $scripts = self::$assets['scripts'] ?? [];

        if (is_array($scripts) && (count($scripts) >= 1)) {
            return collect($scripts)->map(function($item) {
                return asset("/vendor/laratoast/js/{$item}");
            })->flatten()->map(function($scriptUrl) {
                return !empty($scriptUrl) ? '<script src="' . $scriptUrl . '"></script>' : '';
            })->implode(PHP_EOL);
        }

        return false;
    }

    private function getComponentCdnStyles()
    {
        $styles = self::$cdnAssets['styles'] ?? [];

        if (is_array($styles) && (count($styles) >= 1)) {

            return collect($styles)->map(function($item) {
                return $item;
            })->flatten()->map(function($styleUrl) {
                return !empty($styleUrl) ? '<link media="all" type="text/css" rel="stylesheet" href="' . $styleUrl . '">' : '';
            })->implode(PHP_EOL);
        }

        return false;
    }

    private function getComponentCdnScripts()
    {

        $scripts = self::$cdnAssets['scripts'] ?? [];

        if (is_array($scripts) && (count($scripts) >= 1)) {
            return collect($scripts)->map(function($item) {
                return $item;
            })->flatten()->map(function($scriptUrl) {
                return !empty($scriptUrl) ? '<script src="' . $scriptUrl . '"></script>' : '';
            })->implode(PHP_EOL);
        }

        return false;
    }

}
