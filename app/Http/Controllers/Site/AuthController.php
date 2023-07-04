<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\LoginRequest;
use App\Http\Requests\Site\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function showLogin() {
        return view('site.auth.login');
    }

    public function login(LoginRequest $request) {
        $checkUser = $this->checkUser($request->validated());
        if ($checkUser) {
            $user = auth('web')->user();
            if ($user->is_blocked == 1) {
                Auth::logout();
                return response()->json(['key' => 'blocked', 'url' => route('login'), 'msg' => __('site.banned_by_the_admin')]);
            }
            return response()->json(['key' => 'success', 'url' => route('user.dashboard'), 'msg' => __("site.logined")]);

        } else {
            return response()->json(['key' => 'fail', 'msg' => __('site.invalid_data')]);
        }
    }

    private function checkUser($requestData) {
        $attemptData = ['email' => $requestData['email'], 'password' => $requestData['password']];
        $user        = auth()->guard('web')->attempt($attemptData);
        return $user;
    }

    public function showRegister() {
        return view('site.auth.register');
    }

    public function Register(RegisterRequest $request) {
        $user = User::create($request->validated());
        // $user->sendVerificationCode();
        return response()->json(['key' => 'success', 'url' => route('login'), 'msg' => __('auth.registered')]);
    }

}
