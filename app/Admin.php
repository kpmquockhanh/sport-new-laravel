<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name', 'email', 'password'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }


}
