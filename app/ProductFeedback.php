<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeedback extends Model
{
    protected $table = 'product_feedbacks';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
