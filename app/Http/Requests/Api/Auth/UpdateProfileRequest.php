<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
;
use Illuminate\Http\Request;

class UpdateProfileRequest extends FormRequest {


  public function rules() {
    return [
      // 'country_code' => 'sometimes|required|numeric|digits_between:2,5',
      // 'phone'        => 'sometimes|required|numeric|digits_between:9,10|unique:users,phone,' . auth()->id(),
      'name'         => 'sometimes|required|max:50|unique:users,name,' . auth()->id(),
      // 'email'        => 'sometimes|required|email|max:50|unique:users,email,' . auth()->id(),
      'active'       => '',

      //'password'     => 'sometimes|required|min:6|max:100',
      //'old_password' => 'required_with:password|min:6|max:100',
    ];
  }

  public function withValidator($validator) {
    $validator->after(function ($validator) {
      // if ($this->has('old_password') && !Hash::check($this->old_password, auth()->user()->password)) {
      //   $validator->errors()->add('old_password', trans('auth.incorrect_old_pass'));
      // }
    });
  }

}
