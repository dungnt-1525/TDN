<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Color;
use App\Models\Product;

class ProductAttribute extends Model
{
    /**
     * fill into table product_attributes
     * @var array
     */
    protected $fillable = [
        'color_id', 'product_id',
    ];

    public function images()
    {
        return $this->hasMany('Image');
    }

    public function color()
    {
        return $this->belongsTo('Color');
    }

    public function Product()
    {
        return $this->belongsTo('Product');
    }
}
