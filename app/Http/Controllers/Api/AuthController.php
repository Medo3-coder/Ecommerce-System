<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class AuthController extends Controller {

    use ResponseTrait ;
    public function register(RegisterRequest $request)
    {
       $user = User::create($request->validated());
       $user->sendVerificationCode();
       $userData = new UserResource($user->refresh());
       return $this->response('success' ,  __('auth.registered') , $userData);
    }
}





