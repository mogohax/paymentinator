<?php

namespace Libs\PaymentHandling\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Libs\PaymentHandling\Interfaces\PaymentRequest;

abstract class BasePaymentRequest extends FormRequest implements PaymentRequest
{

}
