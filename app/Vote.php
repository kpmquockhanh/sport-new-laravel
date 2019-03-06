<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'user_id', 'new_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function new()
    {
        return $this->belongsTo(News::class);
    }
}
