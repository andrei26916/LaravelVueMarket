<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    public $timestamps = false;

    protected $fillable = ['active'];

    public function images()
    {
        return $this->morphToMany(Image::class, 'image_morph');
    }
}
