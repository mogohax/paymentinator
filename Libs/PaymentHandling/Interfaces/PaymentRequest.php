<?php


namespace Libs\PaymentHandling\Interfaces;

/**
 * Interface PaymentRequest
 * @package Libs\PaymentHandling\Interfaces
 */
interface PaymentRequest
{
    /**
     * Product_id associated with this Request
     *
     * @return string
     */
    public function getProductId(): string;

    /**
     * Gets the internal type of this callback (unique for each payment handler)
     * e.g. cancel, renew_success, renew_fail
     *
     * @return string
     */
    public function getCallbackType(): string;
}
