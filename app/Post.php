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
        'image',
        'url',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function getLatest($value = 3)
    {
        $post = Post::orderBy('created_at', 'desc')->take($value)->get();

        return $post;

    }

    public static function findByUrl($url)
    {
        return self::where('url', $url)->first();
    }

    public function getPath()
    {
        return storage_path('app/public/images/' . $this->image);
    }
}
