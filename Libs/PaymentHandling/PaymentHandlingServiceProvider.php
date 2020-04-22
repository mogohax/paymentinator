<?php

namespace Libs\PaymentHandling;

use Illuminate\Support\ServiceProvider;
use Libs\PaymentHandling\Http\Controllers\AppleController;
use Libs\PaymentHandling\Interfaces\CallbackRequestHandler;
use Libs\PaymentHandling\Services\AppleCallbackHandler;

class PaymentHandlingServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [

    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPaymentRequestHandlers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Http/Routes/payments.v1.php');
    }


    /**
     * Registers various callback handlers to be injected into appropriate controllers
     */
    private function registerPaymentRequestHandlers(): void
    {
        // inject AppleCallbackHandler into AppleController
        $this
            ->app
            ->when(AppleController::class)
            ->needs(CallbackRequestHandler::class)
            ->give(function () {
                return new AppleCallbackHandler();
            });
    }
}
