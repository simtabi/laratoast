<?php

namespace Simtabi\Laratoast\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Simtabi\Laratoast\Console\InstallCommand;
use Simtabi\Laratoast\Contracts\SessionStorage as SessionContract;
use Simtabi\Laratoast\Helpers\LaratoastHelper;
use Simtabi\Laratoast\Providers\Extra\FlashMessageServiceProvider;
use Simtabi\Laratoast\Services\FlashNotifier;
use Simtabi\Laratoast\Services\SessionStorage;
use Illuminate\View\Compilers\BladeCompiler;

class LaratoastServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected               $defer       = false;

    private   const         PACKAGE_PATH = __DIR__ . '/../../';

    public    static array $cdnAssets    = [
        'css'  => [
        ],
        'js' => [
            '//cdn.jsdelivr.net/npm/sweetalert2@11'
        ],
    ];

    public    static array $assets       = [
        'css'  => [
            'jquery.toast.css',
        ],
        'js' => [
            'jquery.toast.js',
        ],
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

        $this->app->bind(SessionContract::class, SessionStorage::class);

        $this->app->singleton(LaratoastHelper::getFlashFacadeName(), function () {
            return $this->app->make(FlashNotifier::class);
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // merge configurations
        $this->mergeConfigFrom(self::PACKAGE_PATH .'config/laratoast.php', 'laratoast');

        // load views
        $this->loadViewsFrom(self::PACKAGE_PATH . 'resources/views', 'laratoast');

        $this->registerDirectives();
        $this->configureComponents();

        if ( $this->app->runningInConsole()) {
            $this->registerPublishables();
            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->app->register(FlashMessageServiceProvider::class);
    }


    private function registerPublishables(): void
    {
        $this->publishes([
            self::PACKAGE_PATH . 'config/laratoast.php' => config_path('laratoast.php'),
        ], 'laratoast:config');

        $this->publishes([
            self::PACKAGE_PATH . 'public'               => public_path('vendor/laratoast'),
        ], 'laratoast:assets');

        $this->publishes([
            self::PACKAGE_PATH . 'resources/views'      => resource_path('views/vendor/laratoast'),
        ], 'laratoast:views');
    }


    private function registerDirectives()
    {
        // inject required javascript
        Blade::include('laratoast::init', 'laratoastInit');

        Blade::directive('laratoastCss', function () {
            $styles  = $this->getComponentCdnStyles();
            $styles .= $this->getComponentStyles();
            return $styles;
        });

        Blade::directive('laratoastJs', function () {
            $scripts  = $this->getComponentCdnScripts();
            $scripts .= $this->getComponentScripts();
            return $scripts;
        });
    }

    private function getComponentStyles()
    {
        $styles = self::$assets['css'] ?? [];

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
        $scripts = self::$assets['js'] ?? [];

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
        $styles = self::$cdnAssets['css'] ?? [];

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

        $scripts = self::$cdnAssets['js'] ?? [];

        if (is_array($scripts) && (count($scripts) >= 1)) {
            return collect($scripts)->map(function($item) {
                return $item;
            })->flatten()->map(function($scriptUrl) {
                return !empty($scriptUrl) ? '<script src="' . $scriptUrl . '"></script>' : '';
            })->implode(PHP_EOL);
        }

        return false;
    }


    /**
     * Configure the Laratoasts' Blade components.
     *
     * @return void
     */
    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('message');
            $this->registerComponent('modal');
        });
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponent(string $component)
    {
        Blade::component('laratoast::components.'.$component, 'laratoast-'.$component);
    }

}
