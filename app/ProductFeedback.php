<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeedback extends Model
{
    protected $table = 'product_feedbacks';

    protected $fillable = ['user_id', 'product_id', 'text', 'rate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
