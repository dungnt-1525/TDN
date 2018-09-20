<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttribute;

class Image extends Model
{
    /**
     * fill into table images
     * @var array
     */
    protected $fillable = [
        'img_path', 'product_attributes_id', 'status',
    ];

    public function productAttribute()
    {
        return $this->belongsTo('ProductAttribute');
    }
}
