<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification {

    public function getTypeAttribute($value) {
        return $this->data['type'];
    }

    public function getTitleAttribute($value) {
        return $this->getTitle($this->data['type'], lang());
    }

    public function getBodyAttribute($value) {
        return $this->getBody($this->data, lang());
    }

    public function getSenderAttribute($value) {
        $def    = 'App\Models\\' . $this->data['sender_model'];
        $sender = $def::find($this->data['sender']);
        return [
            'name'   => $sender->name,
            'avatar' => $sender->avatar,
        ];
    }
}
