<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class News extends Model
{
    use SoftDeletes;

    protected $table ='news';
    protected $primaryKey   = 'id';

    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    public static function scopePublished($query){
        return $query->where('finished_at', '>=', Carbon::now())
            ->where('publish_at', '<=', Carbon::now());
    }


    public static function getLatest($value = 3)
    {
        $news = News::published()->orderBy('publish_at', 'desc')->take($value)->get();

        return $news;

    }


}
