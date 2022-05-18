<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','description','price', 'category_id'];


    public function images(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Image::class, 'image_morph');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(ProductFeedback::class);
    }


}
