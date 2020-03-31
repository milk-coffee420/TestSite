<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Movie extends Model
{
    use SoftDeletes;

    protected $table ='movie';
    protected $primaryKey   = 'id';

    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function scopePublished($query){
        return $query->where('finished_at', '>=', Carbon::now())
            ->where('published_at', '<=', Carbon::now());
    }


    public static function getLatest($value = 3)
    {
        $movie = Movie::published()->orderBy('published_at', 'desc')->take($value)->get();

        return $movie;

    }


}
