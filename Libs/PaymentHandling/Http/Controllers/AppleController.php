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
     */
    public function callback(AppleCallbackRequest $request): JsonResponse
    {
        $this->callbackHandler->handle($request);

        return response()->json('hi from apple callback handler');
    }
}
