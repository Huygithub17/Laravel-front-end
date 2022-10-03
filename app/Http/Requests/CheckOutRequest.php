<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'note' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'email.required' => 'Email không được phép để trống',
            'phone.required' => 'Số điện thoại không được phép để trống',
            'address.required' => 'Địa chỉ không được phép để trống',
            'note.required' => 'Ghi chú đơn đặt hàng không được phép để trống',

        ];
    }
}
