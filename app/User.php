<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'FirstName',
    ];

    public $timestamps = false;

    public function acess()
    {
        return $this->hasMany('App\UserAccess');
    }

    protected $appends = array('count');

    public function getCountAttribute()
    {
        return count($this->acess);
    }
}
