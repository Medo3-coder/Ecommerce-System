<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUpdate extends Model
{
    use HasFactory;
    protected $fillable = ['type','phone','code','country_code','user_id','email'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    private function activationCode()
    {
        return 1234;
        // return mt_rand(1111, 9999);
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = $this->activationCode();
    }
}
