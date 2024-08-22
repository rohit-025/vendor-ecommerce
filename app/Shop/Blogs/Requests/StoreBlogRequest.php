<?php

namespace App\Shop\Blogs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'blog' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'tags' => 'regex:/^([a-zA-Z ]([,])?)+$/'
        ];
    }
}
