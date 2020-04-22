<?php

namespace Libs\PaymentHandling\Http\Requests;

class AppleCallbackRequest extends BasePaymentRequest
{
    const TYPE_INITIAL_BUY = 'INITIAL_BUY';
    const TYPE_CANCEL = 'CANCEL';
    const TYPE_DID_CHANGE_RENEWAL_STATUS = 'DID_CHANGE_RENEWAL_STATUS';

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
            'notification_type' => 'required|string|filled',
            'auto_renew_product_id' => 'required|string|filled',
        ];
    }

    /**
     * @inheritDoc
     */
    public function getProductId(): string
    {
        return $this->get('auto_renew_product_id');
    }

    /**
     * @inheritDoc
     */
    public function getCallbackType(): string
    {
        return $this->get('notification_type');
    }
}
