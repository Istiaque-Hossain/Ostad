<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getCountByCategoryId($categoryid)
    {
        return self::where('category_id', $categoryid)->count();
    }
}
