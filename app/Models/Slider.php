<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model {
    use HasFactory, HasTranslations, UploadTrait;
    const IMAGEPATH      = 'sliders';
    protected $fillable  = ['image', 'title', 'description', 'status'];
    public $translatable = ['title', 'description'];

    protected $casts = ['status' => 'boolean'];

    public function getImageAttribute() {
        if ($this->attributes['image']) {
            $image = $this->getImage($this->attributes['image'], 'sliders');
        } else {
            $image = $this->defaultImage('sliders');
        }
        return $image;
    }

    public function setImageAttribute($value) {
        if ($value != null && is_file($value)) {
            isset($this->attributes['image']) ? $this->deleteFile($this->attributes['image'], 'sliders') : '';
            $this->attributes['image'] = $this->uploadAllTyps($value, 'sliders');
        }
    }
}
