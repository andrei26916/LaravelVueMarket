<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['title','description','price', 'category_id'];


    public function images(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Image::class, 'image_morph');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'image_morph');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(ProductFeedback::class);
    }

    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }


}
