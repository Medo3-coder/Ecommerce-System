<?php

namespace App\Traits;

trait GeneralTrait {
    public function isCodeCorrect($user = null , $code) : bool {
        if(!$user || $code != $user->code){
            return false;
        }
        return true;
    }
}
