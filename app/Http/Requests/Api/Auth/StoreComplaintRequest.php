<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest {

  public function rules() {
    return [
      'user_name' => 'required|max:50',
      'phone'     => 'required|max:20',
      'complaint' => 'required|max:500',
    ];
  }
}
