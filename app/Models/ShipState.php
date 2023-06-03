<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ShipState extends Model {
    use HasFactory, HasTranslations;
    protected $fillable  = ['name','district_id' , 'division_id'];
    public $translatable = ['name'];

    public function division() {

        return $this->belongsTo(ShipDivision::class);
    }

    public function district() {

        return $this->belongsTo(ShipDistrict::class);
    }
}
