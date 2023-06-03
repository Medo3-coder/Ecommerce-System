<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ShipDivision extends Model {
    use HasFactory, HasTranslations;

    protected $fillable  = ['name'];
    public $translatable = ['name'];

    public function district(){
        $this->hasMany(ShipDistrict::class);
    }
    public function state(){
        $this->hasMany(ShipState::class);
    }
}
