<?php

namespace Libs\PaymentHandling\Services;

use Libs\PaymentHandling\Events\SuccessfulPaymentEvent;
use Libs\PaymentHandling\Exceptions\CallbackHandlerException;
use Libs\PaymentHandling\Interfaces\CallbackRequestHandler;
use Libs\PaymentHandling\Interfaces\PaymentEvent;
use Libs\PaymentHandling\Interfaces\PaymentRequest;

class AppleCallbackHandler implements CallbackRequestHandler
{
    const TYPE_INITIAL_BUY = 'INITIAL_BUY';
    const TYPE_CANCEL = 'CANCEL';
    const TYPE_DID_CHANGE_RENEWAL_STATUS = 'DID_CHANGE_RENEWAL_STATUS';

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function handle(PaymentRequest $request): PaymentEvent
    {
        $paymentEvent = null;

        switch ($request->getCallbackType()) {
            case static::TYPE_INITIAL_BUY:
                $paymentEvent = $this->makeSuccessfulPaymentEvent($request->getProductId());
                break;
            case static::TYPE_CANCEL:
                // @TODO: produce cancelled payment event
                throw new \Exception('not implemented yet');
                break;
            case static::TYPE_DID_CHANGE_RENEWAL_STATUS:
                // @TODO: produce refunded payment event
                throw new \Exception('not implemented yet');
                break;
            default:
                throw new CallbackHandlerException(
                    "Unhandled callback type \"{$request->getCallbackType()}\" in AppleCallbackHandler."
                );
                break;
        }

        return $paymentEvent;
    }

    /**
     * Produces a successful payment event
     *
     * @param string $orderId
     * @return SuccessfulPaymentEvent
     */
    private function makeSuccessfulPaymentEvent(string $orderId): SuccessfulPaymentEvent
    {
        return new SuccessfulPaymentEvent($orderId);
    }
}
