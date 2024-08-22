<?php

namespace App\Shop\Coupons\Requests;

use App\Shop\Base\BaseFormRequest;

class StoreCouponRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'code' => 'required|unique:coupons',
            'discount' => 'required|numeric',
            'min_amount' => 'numeric',
            'type' => 'required'
        ];
    }
}
