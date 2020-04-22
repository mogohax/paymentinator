<?php

namespace Libs\PaymentHandling\Http\Requests;

class AppleCallbackRequest extends BasePaymentRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //@TODO: validate that request is coming from Apple
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
