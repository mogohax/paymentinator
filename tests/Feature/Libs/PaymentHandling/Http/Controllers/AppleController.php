<?php

namespace Tests\Feature\Libs\PaymentHandling\Http\Controllers;

use Illuminate\Support\Facades\Event;
use Libs\PaymentHandling\Events\CancelledPaymentEvent;
use Libs\PaymentHandling\Events\SuccessfulPaymentEvent;
use Libs\PaymentHandling\Http\Requests\AppleCallbackRequest;
use Tests\TestCase;

class AppleController extends TestCase
{
    /**
     * @test
     */
    public function validates_fields()
    {
        Event::fake();

        $response = $this->postJson(route('api.v1.payments.apple.callback', []));
        $response->assertStatus(422);

        $response = $this->postJson(route('api.v1.payments.apple.callback', [
            'notification_type' => '',
        ]));
        $response->assertStatus(422);

        $response = $this->postJson(route('api.v1.payments.apple.callback', [
            'notification_type' => AppleCallbackRequest::TYPE_INITIAL_BUY,
        ]));
        $response->assertStatus(422);

        $response = $this->postJson(route('api.v1.payments.apple.callback', [
            'notification_type' => AppleCallbackRequest::TYPE_INITIAL_BUY,
            'auto_renew_product_id' => '',
        ]));
        $response->assertStatus(422);
    }

    /**
     * @test
     * @covers \Libs\PaymentHandling\Http\Controllers\AppleController::callback
     */
    public function dispatches_SuccessfulPaymentEvent_for_TYPE_INITIAL_BUY_notification()
    {
        Event::fake();

        $response = $this->postJson(route('api.v1.payments.apple.callback', [
            'notification_type' => AppleCallbackRequest::TYPE_INITIAL_BUY,
            'auto_renew_product_id' => '27',
        ]));
        $response->assertStatus(200);

        Event::assertDispatched(SuccessfulPaymentEvent::class, function (SuccessfulPaymentEvent $e) {
            return $e->getOrderId() === '27';
        });
    }

    /**
     * @test
     * @covers \Libs\PaymentHandling\Http\Controllers\AppleController::callback
     */
    public function dispatches_CancelledPaymentEvent_for_TYPE_CANCEL_notification()
    {
        Event::fake();

        $response = $this->postJson(route('api.v1.payments.apple.callback', [
            'notification_type' => AppleCallbackRequest::TYPE_CANCEL,
            'auto_renew_product_id' => '34',
        ]));
        $response->assertStatus(200);

        Event::assertDispatched(CancelledPaymentEvent::class, function (CancelledPaymentEvent $e) {
            return $e->getOrderId() === '34';
        });

    }
}
