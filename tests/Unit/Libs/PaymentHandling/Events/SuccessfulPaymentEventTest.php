<?php

namespace Tests\Unit\Libs\PaymentHandling\Events;

use Libs\PaymentHandling\Events\SuccessfulPaymentEvent;
use PHPUnit\Framework\TestCase;

class SuccessfulPaymentEventTest extends TestCase
{
    /**
     * @test
     * @covers \Libs\PaymentHandling\Events\SuccessfulPaymentEvent::getOrderId
     */
    public function event_returns_a_correct_order_id()
    {
        $event = new SuccessfulPaymentEvent('correctOrderId');
        $this->assertEquals(
            'correctOrderId',
            $event->getOrderId()
        );
    }
}
