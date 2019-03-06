<?php

namespace App;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';
    protected $fillable = [
        'name', 'email', 'password', 'ava'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }


}
