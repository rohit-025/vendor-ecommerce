<?php

namespace App\Shop\Coupons\Requests;

use Illuminate\Validation\Rule;
use App\Shop\Base\BaseFormRequest;

class UpdateCouponRequest extends BaseFormRequest
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
        $id = $this->route('coupon');

        return [
            'code' => ['required',Rule::unique('coupons','code')->ignore($id)],
            'discount' => 'required|numeric',
            'min_amount' => 'numeric',
            'type' => 'required'
        ];
    }
}
