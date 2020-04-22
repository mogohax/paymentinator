<?php

namespace Libs\PaymentHandling\Events;

use Libs\PaymentHandling\Interfaces\PaymentEvent;

class CancelledPaymentEvent implements PaymentEvent
{

    /**
     * @inheritDoc
     */
    public function getOrderId(): string
    {
        // TODO: Implement getOrderId() method.
        throw new \Exception('not implemented yet!');
    }
}
