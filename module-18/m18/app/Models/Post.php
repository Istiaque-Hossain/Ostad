<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getCountByCategoryId($categoryid)
    {
        return self::where('category_id', $categoryid)->count();
    }
}
