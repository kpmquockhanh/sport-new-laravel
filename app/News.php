<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
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
}
