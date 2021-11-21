<?php

namespace Simtabi\Laratoast\Providers\Extra;

use Illuminate\Routing\Router;
use Simtabi\Laratoast\Helpers\LaratoastHelper;
use Simtabi\Laratoast\Http\Middleware\ShareMessagesFromSessionMiddleware;
use Simtabi\Laratoast\Services\ViewFlashMessageBag;
use Simtabi\Laratoast\View\Components\Alert;
use Simtabi\Laratoast\View\Components\AlertMessages;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;

class FlashMessageServiceProvider extends ServiceProvider
{
    public const VIEW_COMPONENT_NAMESPACE = 'laratoast';


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    public function boot()
    {
        $this->loadViewComponentsAs(self::VIEW_COMPONENT_NAMESPACE, [
            'alert'         => Alert::class,
            'alert-message' => AlertMessages::class,
        ]);
        
        // This is used when adding a message from a controller: view('posts-index')->withMessage(...)
        View::macro('withMessage', function (Message $message, string $bag = 'default'): View {
            /** @var ViewFlashMessageBag $viewFlashMessageBag */
            $viewFlashMessageBag = ViewFacade::shared(LaratoastHelper::getConfig('view_share'), new ViewFlashMessageBag());

            ViewFacade::share(LaratoastHelper::getConfig('view_share'), $viewFlashMessageBag->push($message, $bag));

            return $this;
        });

        // This is used when adding a message from the View Facade: ViewFacade::withMessage(...)
        Factory::macro('withMessage', function (Message $message, string $bag = 'default'): Factory {
            /** @var ViewFlashMessageBag $viewFlashMessageBag */
            $viewFlashMessageBag = ViewFacade::shared(LaratoastHelper::getConfig('view_share'), new ViewFlashMessageBag());

            ViewFacade::share(LaratoastHelper::getConfig('view_share'), $viewFlashMessageBag->push($message, $bag));

            return $this;
        });

        // This is used when adding messages from a controller: view('posts-index')->withMessages(...)
        View::macro('withMessages', function (array $messages, string $bag = 'default'): View {
            /** @var ViewFlashMessageBag $viewFlashMessageBag */
            $viewFlashMessageBag = ViewFacade::shared(LaratoastHelper::getConfig('view_share'), new ViewFlashMessageBag());

            /** @var Message $message */
            foreach ($messages as $message) {
                $viewFlashMessageBag->push($message, $bag);
            }
            ViewFacade::share(LaratoastHelper::getConfig('view_share'), $viewFlashMessageBag);

            return $this;
        });

        // This is used when adding messages from the View Facade: ViewFacade::withMessages(...)
        Factory::macro('withMessages', function (array $messages, string $bag = 'default'): Factory {
            /** @var ViewFlashMessageBag $viewFlashMessageBag */
            $viewFlashMessageBag = ViewFacade::shared(LaratoastHelper::getConfig('view_share'), new ViewFlashMessageBag());

            /** @var Message $message */
            foreach ($messages as $message) {
                $viewFlashMessageBag->push($message, $bag);
            }
            ViewFacade::share(LaratoastHelper::getConfig('view_share'), $viewFlashMessageBag);

            return $this;
        });

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', ShareMessagesFromSessionMiddleware::class);
    }
    
}