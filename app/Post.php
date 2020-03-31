<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    protected $table ='post';
    protected $primaryKey   = 'id';

    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'text',
        'title',
        'hashtag',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function getLatest($value = 3)
    {
        $movie = Movie::orderBy('created_at', 'desc')->take($value)->get();

        return $movie;

    }


}
