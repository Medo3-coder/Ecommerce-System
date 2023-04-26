<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class changePhoneSendCodeRequest extends FormRequest
{
    public function __construct(Request $request) {
        $request['phone']        = fixPhone($request['phone']);
        $request['country_code'] = fixPhone($request['country_code']);
    }

    public function rules() {
        return [
            'country_code' => 'required|exists:users,country_code',
            'phone'        => 'required|unique:users,phone',
        ];
    }
}
