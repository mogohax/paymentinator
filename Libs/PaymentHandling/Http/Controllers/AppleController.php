<?php

namespace Libs\PaymentHandling\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Libs\PaymentHandling\Http\Requests\AppleCallbackRequest;
use Libs\PaymentHandling\Interfaces\CallbackRequestHandler;

class AppleController extends BaseController
{
    /**
     * @var CallbackRequestHandler
     */
    private $callbackHandler;

    /**
     * AppleController constructor.
     *
     * @param CallbackRequestHandler $callbackHandler
     */
    public function __construct(CallbackRequestHandler $callbackHandler)
    {
        $this->callbackHandler = $callbackHandler;
    }

    /**
     * @param AppleCallbackRequest $request
     * @return JsonResponse
     * @throws \Libs\PaymentHandling\Exceptions\CallbackHandlerException
     */
    public function callback(AppleCallbackRequest $request): JsonResponse
    {
        // Produces a PaymentEvent
        $paymentEvent = $this->callbackHandler->handle($request);

        // Dispatches the event
        event($paymentEvent);

        return response()->json('ok');
    }
}
