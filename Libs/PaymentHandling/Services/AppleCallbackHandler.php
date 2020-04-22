<?php

namespace Libs\PaymentHandling\Services;

use Libs\PaymentHandling\Interfaces\CallbackRequestHandler;
use Libs\PaymentHandling\Interfaces\PaymentRequest;

class AppleCallbackHandler implements CallbackRequestHandler
{

    /**
     * @inheritDoc
     */
    public function handle(PaymentRequest $request): void
    {
        // TODO: Implement handle() method.
    }
}
