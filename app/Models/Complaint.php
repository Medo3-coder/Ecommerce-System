<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model {

    protected $fillable = ['user_name', 'user_id', 'complaint', 'phone', 'email'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function replays() {
        return $this->hasMany(ComplaintReplay::class, 'complaint_id', 'id');
    }
}
