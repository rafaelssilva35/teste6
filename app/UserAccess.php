<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    protected $table = 'users_acess';

    protected $fillable = [
        'user_id', 'last_login',
    ];
    
    public $timestamps = false;
}
