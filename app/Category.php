<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name', 'priority'];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
