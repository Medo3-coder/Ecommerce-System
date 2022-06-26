<?php

namespace App\Http\Requests\Admin\State;

use Illuminate\Foundation\Http\FormRequest;

class storeStateRequest extends FormRequest
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
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required|max:225',
        ];
    }
}
