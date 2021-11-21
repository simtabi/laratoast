<?php

namespace Simtabi\Laratoast\Providers\Extra;

use Illuminate\Routing\Router;
use Simtabi\Laratoast\View\Components\Alert;
use Simtabi\Laratoast\View\Components\AlertMessages;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FlashMessageServiceProvider extends PackageServiceProvider
{
    public const VIEW_COMPONENT_NAMESPACE = 'flash';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-flash-message')
            ->hasConfigFile()
            ->hasViews() // required for the view component blade files to be registered
            ->hasViewComponents(
                self::VIEW_COMPONENT_NAMESPACE,
                Alert::class,
                AlertMessages::class
            );
    }

    public function packageBooted()
    {
        // This is used when adding a message from a controller: view('posts-index')->withMessage(...)
        View::macro('withMessage', function (Message $message, string $bag = 'default'): View {
            /** @var ViewFlashMessageBag $viewFlashMessageBag */
            $viewFlashMessageBag = ViewFacade::shared(config('laratoast.flashit.view_share'), new ViewFlashMessageBag());

            ViewFacade::share(config('laratoast.flashit.view_share'), $viewFlashMessageBag->push($message, $bag));

            return $this;
        });

        // This is used when adding a message from the View Facade: ViewFacade::withMessage(...)
        Factory::macro('withMessage', function (Message $message, string $bag = 'default'): Factory {
            /** @var ViewFlashMessageBag $viewFlashMessageBag */
            $viewFlashMessageBag = ViewFacade::shared(config('laratoast.flashit.view_share'), new ViewFlashMessageBag());

            ViewFacade::share(config('laratoast.flashit.view_share'), $viewFlashMessageBag->push($message, $bag));

            return $this;
        });

        // This is used when adding messages from a controller: view('posts-index')->withMessages(...)
        View::macro('withMessages', function (array $messages, string $bag = 'default'): View {
            /** @var ViewFlashMessageBag $viewFlashMessageBag */
            $viewFlashMessageBag = ViewFacade::shared(config('laratoast.flashit.view_share'), new ViewFlashMessageBag());

            /** @var Message $message */
            foreach ($messages as $message) {
                $viewFlashMessageBag->push($message, $bag);
            }
            ViewFacade::share(config('laratoast.flashit.view_share'), $viewFlashMessageBag);

            return $this;
        });

        // This is used when adding messages from the View Facade: ViewFacade::withMessages(...)
        Factory::macro('withMessages', function (array $messages, string $bag = 'default'): Factory {
            /** @var ViewFlashMessageBag $viewFlashMessageBag */
            $viewFlashMessageBag = ViewFacade::shared(config('laratoast.flashit.view_share'), new ViewFlashMessageBag());

            /** @var Message $message */
            foreach ($messages as $message) {
                $viewFlashMessageBag->push($message, $bag);
            }
            ViewFacade::share(config('laratoast.flashit.view_share'), $viewFlashMessageBag);

            return $this;
        });

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', ShareMessagesFromSessionMiddleware::class);
    }
}
