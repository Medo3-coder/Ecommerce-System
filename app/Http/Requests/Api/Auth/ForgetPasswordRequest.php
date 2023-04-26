<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ForgetPasswordRequest extends FormRequest {
  public function __construct(Request $request) {
    $request['phone']        = fixPhone($request['phone']);
    $request['country_code'] = fixPhone($request['country_code']);
  }

  public function rules() {
    return [
      'code'         => 'required|max:10',
      'country_code' => 'required|exists:users,country_code',
      'phone'        => 'required|exists:users,phone',
      'password'     => 'required|min:6|max:100',
    ];
  }
}
