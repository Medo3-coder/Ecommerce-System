<?php

namespace App\Models;

use App\Http\Resources\Api\UserResource;
use Carbon\Carbon;
use App\Traits\SmsTrait;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use UploadTrait;
    use SmsTrait ;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'country_code',
        'phone',
        'email',
        'password',
        'image',
        'active',
        'is_blocked',
        'is_approved',
        'lang',
        'is_notify',
        'code',
        'code_expire',
        'lat',
        'lng',
        'map_desc',
        'wallet_balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'lat'               => 'decimal:8',
        'lng'               => 'decimal:8',
        'is_notify'         => 'boolean',
        'is_blocked'        => 'boolean',
        'is_approved'       => 'boolean',
        'active'            => 'boolean',

    ];

    // /**
    //  * The accessors to append to the model's array form.
    //  *
    //  * @var array
    //  */
    // protected $appends = [
    //     'profile_photo_url',
    // ];

    public function setCountryCode($value) {
        if (!empty($value)) {
            $this->attributes['country_code'] = fixPhone($value);
        }
    }

    public function getFullPhoneAttribute() {
        return $this->attributes['country_code'] . $this->attributes['phone'];
    }

    public function getImageAttribute() {
        if ($this->attributes['image']) {
            $image = $this->getImage($this->attributes['image'], 'users');
        } else {
            $image = $this->defaultImage('users');
        }
        return $image;
    }

    public function setImageAttribute($value) {
        if ($value != null && is_file($value)) {
            isset($this->attributes['image']) ? $this->deleteFile($this->attributes['image'], 'users') : '';
            $this->attributes['image'] = $this->uploadAllTyps($value, 'users');
        }
    }

    public function setPasswordsAttribute($value) {
        if ($value) {
            $this->attributes['passwords'] = bcrypt($value);
        }
    }

    public function replays() {
        return $this->morphMany(ComplaintReplay::class, 'replayer');
    }

    public function notifications() {
        return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');

    }

    public function transactions() {
        return $this->morphMany(Transaction::class, 'transactionable')->latest();
    }

    public function markAsActive() {
        $this->update(['code' => null, 'code_expire' => null, 'active' => true]);
        return $this;
    }

    public function sendVerificationCode() {
        $this->update([
            'code'        => $this->activationCode(),
            'code_expire' => Carbon::now()->addMinute(),
        ]);
        $this->sendCodeAtSms($this->code);
        return ['user' => new UserResource($this->refresh())];
    }

    private function activationCode() {
        return 1234;
        // return mt_rand(1111, 9999);
    }

    public function sendCodeAtSms($code, $full_phone = null) {
        $msg = trans('api.activeCode');
        $this->sendSms($full_phone ?? $this->full_phone, $msg . $code);
    }

    public function logout() {
        $this->tokens()->delete();
        if (request()->device_id) {
            $this->devices()->where(['device_id' => request()->device_id])->delete();
        }
        return true;
    }

    public function devices() {
        return $this->morphMany(Device::class, 'morph');
    }

    public function login() {
        $this->updateUserDevice();
        $this->updateUserLang();
        $token = $this->createToken(request()->device_type)->plainTextToken;
        return UserResource::make($this)->setToken($token);
    }

    public function updateUserLang() {
        if (request()->header('Lang') != null && in_array(request()->header('Lang'), languages())) {
            $this->update(['lang' => request()->header('Lang')]);
        } else {
            $this->update(['lang' => defaultLang()]);
        }
    }

    public function updateUserDevice() {
        if (request()->device_id) {
            $this->devices()->updateOrCreate([
                'device_id'   => request()->device_id,
                'device_type' => request()->device_type,
            ]);
        }
    }

    public static function boot() {
        parent::boot();
        /* creating, created, updating, updated, deleting, deleted, forceDeleted, restored */

        static::deleted(function ($model) {
            $model->deleteFile($model->attributes['image'], 'users');
        });
    }
}
