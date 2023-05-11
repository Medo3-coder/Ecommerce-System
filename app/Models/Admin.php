<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use App\Traits\UploadTrait;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable {
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use UploadTrait ;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role_id',
        'is_notify',
        'is_blocked',

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
        'is_notify'         => 'boolean',
        'is_blocked'        => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // protected $appends = [
    //     'profile_photo_url',
    // ];

    public function getAvatarAttribute() {
        if ($this->attributes['avatar']) {
            $image = $this->getImage($this->attributes['avatar'], 'admins');
        } else {
            $image = $this->defaultImage('admins');
        }
        return $image;
    }

    public function setAvatarAttribute($value) {
        if (null != $value && is_file($value)) {
            isset($this->attributes['avatar']) ? $this->deleteFile($this->attributes['avatar'], 'admins') : '';
            $this->attributes['avatar'] = $this->uploadAllTyps($value, 'admins');
        }
    }

    public function role() {
        return $this->belongsTo(Role::class)->withTrashed();
    }

    public function setPasswordAttribute($value) {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function replays() {
        return $this->morphMany(ComplaintReplay::class, 'replayer');
    }

    public function rooms() {
        return $this->morphMany(RoomMember::class, 'memberable');
    }

    public function ownRooms() {
        return $this->morphMany(Room::class, 'createable');
    }

    public function joinedRooms() {
        return $this->morphMany(RoomMember::class, 'memberable')
            ->with('room')
            ->get()
            ->sortByDesc('last_message_id')
            ->pluck('room');
    }

    public function transactions() {
        return $this->morphMany(Transaction::class, 'transactionable')->latest();
    }

    public function notifications() {
        return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');

    }

    public static function boot() {
        parent::boot();
        /* creating, created, updating, updated, deleting, deleted, forceDeleted, restored */

        static::deleted(function ($model) {
            $model->deleteFile($model->attributes['avatar'], 'admins');
        });

    }
}
