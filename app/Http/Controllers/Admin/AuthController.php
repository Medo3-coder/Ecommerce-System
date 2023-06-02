<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller {
    public function SetLanguage($lang) {
        if (in_array($lang, ['ar', 'en'])) {
            if (session()->has('lang')) {
                session()->forget('lang');
            }

            session()->put('lang', $lang);
        } else {
            if (session()->has('lang')) {
                session()->forget('lang');
            }
            session()->put('lang', 'ar');
        }
        return back();
    }

    public function showLoginForm() {
        return view('admin.auth.login');
    }

    public function login(loginRequest $request) {
        if ($this->checkTooManyFailedAttempts()) {
            return $this->checkTooManyFailedAttempts();
        }

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'is_blocked' => 0])) {

            RateLimiter::clear($this->throttleKey());

            session()->put('lang', 'ar');
            return response()->json(['status' => 'login', 'url' => route('admin.dashboard'), 'message' => __('admin.login_successfully_logged')]);

        } else {
            if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                auth('admin')->logout();
                return response()->json(['status' => 0, 'message' => __('auth.blocked')]);
            }

            RateLimiter::hit($this->throttleKey(), $seconds = 3600);
            return response()->json(['status' => 0, 'message' => __('admin.incorrect_password')]);
        }
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey() {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     */
    public function checkTooManyFailedAttempts() {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 10)) {
            return;
        }
        return response()->json(['status' => 0, 'message' => 'IP address banned. Too many login attempts, try after 60 minute']);
    }

    public function logout() {
        auth('admin')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect(route('admin.login'));
    }
}
