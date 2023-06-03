<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ShipDistrict extends Model {
    use HasFactory, HasTranslations;

    protected $fillable  = ['name' , 'division_id'];
    public $translatable = ['name'];

    public function division() {

        return $this->belongsTo(ShipDivision::class);
    }
}
