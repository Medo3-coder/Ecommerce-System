<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Brand extends Model {
    use HasFactory, HasTranslations, UploadTrait;
    const IMAGEPATH      = 'brands';
    protected $fillable  = ['name', 'slug', 'image'];
    public $translatable = ['name','slug'];

    public function getImageAttribute() {
        if ($this->attributes['image']) {
            $image = $this->getImage($this->attributes['image'], 'brands');
        } else {
            $image = $this->defaultImage('brands');
        }
        return $image;
    }

    public function setImageAttribute($value) {
        if ($value != null && is_file($value)) {
            isset($this->attributes['image']) ? $this->deleteFile($this->attributes['image'], 'brands') : '';
            $this->attributes['image'] = $this->uploadAllTyps($value, 'brands');
        }
    }

}
