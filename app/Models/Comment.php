<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Comment extends Model
{
    /**
     * fill into table comments
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'comment_type',
        'comment_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('Product');
    }
}
