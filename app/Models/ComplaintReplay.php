<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintReplay extends Model {

    protected $fillable = ['replay', 'replayer_id', 'replayer_type', 'complaint_id'];

    public function replayer() {
        return $this->morphTo();
    }

    public function complaint() {
        return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
    }
}
