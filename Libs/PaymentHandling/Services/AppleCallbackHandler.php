<?php

namespace Libs\PaymentHandling\Services;

use Libs\PaymentHandling\Events\CancelledPaymentEvent;
use Libs\PaymentHandling\Events\SuccessfulPaymentEvent;
use Libs\PaymentHandling\Exceptions\CallbackHandlerException;
use Libs\PaymentHandling\Http\Requests\AppleCallbackRequest;
use Libs\PaymentHandling\Interfaces\CallbackRequestHandler;
use Libs\PaymentHandling\Interfaces\PaymentEvent;
use Libs\PaymentHandling\Interfaces\PaymentRequest;

class AppleCallbackHandler implements CallbackRequestHandler
{
    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function handle(PaymentRequest $request): PaymentEvent
    {
        $paymentEvent = null;

        switch ($request->getCallbackType()) {
            case AppleCallbackRequest::TYPE_INITIAL_BUY:
                $paymentEvent = $this->makeSuccessfulPaymentEvent($request->getProductId());
                break;
            case AppleCallbackRequest::TYPE_CANCEL:
                $paymentEvent = $this->makeCancelledPaymentEvent($request->getProductId());
                break;
            case AppleCallbackRequest::TYPE_DID_CHANGE_RENEWAL_STATUS:
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

    /**
     * Produces a cancelled payment event
     *
     * @param string $orderId
     * @return CancelledPaymentEvent
     */
    private function makeCancelledPaymentEvent(string $orderId): CancelledPaymentEvent
    {
        return new CancelledPaymentEvent($orderId);
    }
}
