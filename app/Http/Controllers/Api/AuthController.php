<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ActivateRequest;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\Auth\forgetPasswordSendCodeRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\UpdatePasswordRequest;
use App\Http\Requests\Api\Auth\UpdateProfileRequest;
use App\Http\Resources\Api\Notifications\NotificationsCollection;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use App\Models\UserUpdate;
use App\Traits\GeneralTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    use ResponseTrait, GeneralTrait;
    public function register(RegisterRequest $request) {
        $user = User::create($request->validated());
        $user->sendVerificationCode();
        $userData = new UserResource($user->refresh());
        return $this->response('success', __('auth.registered'), $userData);
    }

    public function activate(ActivateRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {
            return $this->failMsg(__('auth.failed'));
        }
        if (!$this->isCodeCorrect($user, $request->code)) {
            return $this->failMsg(trans('auth.code_invalid'));
        }

        return $this->response('success', __('auth.activated'), ['user' => $user->markAsActive()->login()]);
    }

    public function resendCode(ResendCodeRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }
        $user->sendVerificationCode();

        return $this->response('success', __('auth.code_re_send'));
    }

    public function login(LoginRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->failMsg(__('auth.failed'));
        }

        if ($user->is_blocked) {
            return $this->blockedReturn($user);
        }

        if (!$user->active) {
            return $this->phoneActivationReturn($user);
        }

        return $this->response('success', __('apis.signed'), $user->login());
    }

    public function logout(Request $request) {
        if ($request->bearerToken()) {
            $user = Auth::guard('sanctum')->user();
            if ($user) {
                $user->logout();
            }
        }

        return $this->response('success', __('apis.loggedOut'));
    }

    public function getProfile(Request $request) {
        $user         = auth()->user();
        $requestToken = ltrim($request->header('authorization'), 'Bearer ');
        $userData     = UserResource::make($user)->setToken($requestToken);
        return $this->successData($userData);
    }

    public function updateProfile(UpdateProfileRequest $request) {
        $user = auth()->user();
        $user->update($request->validated());
        $requestToken = ltrim($request->header('authorization'), 'Bearer');
        $userData     = UserResource::make($user->refresh())->setToken($requestToken);
        if (!$user->active) {
            return $this->phoneActivationReturn($user);
        }
        return $this->response('success', __('apis.updated'), ['user' => $userData]);

    }

    public function updatePassword(UpdatePasswordRequest $request) {
        $user = auth()->user();
        $user->update($request->validated());
        return $this->successMsg(__('apis.updated'));
    }

    public function forgetPasswordSendCode(forgetPasswordSendCodeRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }
        if (!$user) {
            return $this->failMsg(trans('site.user_wrong'));
        }
        UserUpdate::updateOrCreate(['user_id' => $user->id, 'type' => 'password'], ['code' => '']);
        return $this->successMsg(__('apis.success'));
    }

    public function resetPassword(ForgetPasswordRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }

        if (!$this->isCodeCorrect($user, $request->code)) {
            return $this->failMsg(trans('auth.code_invalid'));
        }

        $user->update(['password' => $request->password, 'code' => null, 'code_expire' => null]);
        return $this->successMsg(trans('auth.password_changed'));
    }

    public function changeLang(Request $request) {
        $user = auth()->user();
        $lang = in_array($request->lang, languages()) ? $request->lang : 'ar';
        $user->update(['lang' => $lang]);
        App::setLocale($lang);
        return $this->successMsg(__('apis.updated'));

    }

    public function getNotifications() {
        auth()->user()->unreadNotifications->markAsRead();
        $notifications = new NotificationsCollection(auth()->user()->notifications()->paginate($this->paginateNum()));
        return $this->successData(['notifications' => $notifications]);
    }

    public function countUnreadNotifications($notification_id) {
        auth()->user()->notifications()->where('id', $notification_id)->delete();
        return $this->successMsg(__('site.notify_deleted'));
    }

    public function deleteNotifications() {
        auth()->user()->notifications()->delete();
        return $this->successMsg(__('apis.deleted'));
    }
}
