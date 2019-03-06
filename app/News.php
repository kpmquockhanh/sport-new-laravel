<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $fillable = [
        'title', 'content', 'thumbnail', 'admin_id'
    ];
    public static function getNews()
    {
        return self::query()
            ->orderByDesc('id')
            ->take(10)
            ->get();
    }

    public static function getTrending($num)
    {
        return self::query()
            ->orderByDesc('view')
            ->take($num)
            ->get();
    }

    public static function getRandom($num)
    {
        return self::query()
            ->inRandomOrder()
            ->take($num)
            ->get();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'new_id');
    }
}
