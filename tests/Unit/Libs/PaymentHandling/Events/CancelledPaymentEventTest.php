<?php

namespace Tests\Unit\Libs\PaymentHandling\Events;

use Libs\PaymentHandling\Events\CancelledPaymentEvent;
use PHPUnit\Framework\TestCase;

class CancelledPaymentEventTest extends TestCase
{
    /**
     * @test
     * @covers \Libs\PaymentHandling\Events\CancelledPaymentEvent::getOrderId
     */
    public function event_returns_a_correct_order_id()
    {
        $event = new CancelledPaymentEvent('correctOrderId');
        $this->assertEquals(
            'correctOrderId',
            $event->getOrderId()
        );
    }
}
