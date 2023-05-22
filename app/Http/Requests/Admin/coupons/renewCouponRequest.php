<?php

namespace App\Http\Requests\Admin\coupons;

use Illuminate\Foundation\Http\FormRequest;

class renewCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'expire_date'           => 'required|after:'.\Carbon\Carbon::now(),
        ];
    }
}
