<?php

namespace Tests\Unit\Libs\PaymentHandling\Services;

use Libs\PaymentHandling\Events\CancelledPaymentEvent;
use Libs\PaymentHandling\Events\SuccessfulPaymentEvent;
use Libs\PaymentHandling\Exceptions\CallbackHandlerException;
use Libs\PaymentHandling\Http\Requests\AppleCallbackRequest;
use Libs\PaymentHandling\Interfaces\PaymentRequest;
use Libs\PaymentHandling\Services\AppleCallbackHandler;
use PHPUnit\Framework\TestCase;

class AppleCallbackHandlerTest extends TestCase
{
    /**
     * @var AppleCallbackHandler
     */
    private $appleHandler;

    public function setUp(): void
    {
        $this->appleHandler = new AppleCallbackHandler();
    }

    /**
     * @test
     * @covers AppleCallbackHandler::handle(), AppleCallbackHandler::makeSuccessfulPaymentEvent()
     */
    public function produces_a_valid_SuccessfulPaymentEvent_for_INITIAL_BUY_callback_type()
    {
        $productId = random_int(1, 100);

        $callbackRequest = \Mockery::mock(PaymentRequest::class);

        $callbackRequest
            ->allows()
            ->getCallbackType()
            ->andReturns(AppleCallbackRequest::TYPE_INITIAL_BUY);
        $callbackRequest
            ->allows()
            ->getProductId()
            ->andReturns($productId);

        $event = $this->appleHandler->handle($callbackRequest);

        $this->assertInstanceOf(
            SuccessfulPaymentEvent::class,
            $event
        );

        $this->assertEquals(
            $productId,
            $event->getOrderId()
        );
    }

    /**
     * @test
     * @covers AppleCallbackHandler::handle(), AppleCallbackHandler::makeCancelledPaymentEvent()
     */
    public function produces_a_valid_CancelledPaymentEvent_for_CANCEL_callback_type()
    {
        $productId = random_int(1, 100);

        $callbackRequest = \Mockery::mock(PaymentRequest::class);

        $callbackRequest
            ->allows()
            ->getCallbackType()
            ->andReturns(AppleCallbackRequest::TYPE_CANCEL);
        $callbackRequest
            ->allows()
            ->getProductId()
            ->andReturns($productId);

        $event = $this->appleHandler->handle($callbackRequest);

        $this->assertInstanceOf(
            CancelledPaymentEvent::class,
            $event
        );

        $this->assertEquals(
            $productId,
            $event->getOrderId()
        );
    }

    /**
     * @test
     * @covers AppleCallbackHandler::handle()
     */
    public function throws_an_exception_when_handling_a_request_with_an_unknown_callback_type()
    {
        $this->expectException(CallbackHandlerException::class);

        $callbackRequest = \Mockery::mock(PaymentRequest::class);

        $callbackRequest
            ->allows()
            ->getCallbackType()
            ->andReturns('this_type_clearly_does_not_exist');

        $event = $this->appleHandler->handle($callbackRequest);
    }
}
