<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    /**
     * fill into table posts
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'img',
        'user_id',
        'status',
    ];

    public function user() {
        return $this->belongsTo('User');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
