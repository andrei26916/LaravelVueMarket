<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthLog extends Model
{
    protected $table = 'auth_log';

    protected $fillable = ['ip', 'device', 'user_id'];
}
