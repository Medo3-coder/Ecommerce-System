<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $fillable = ['name'];

    public $translatable = ['name'];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
