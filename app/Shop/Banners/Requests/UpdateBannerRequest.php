<?php

namespace App\Shop\Banners\Requests;

use App\Shop\Base\BaseFormRequest;

class UpdateBannerRequest extends BaseFormRequest
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
            'title' => 'required',
            'section' => 'required'
        ];
    }
}
