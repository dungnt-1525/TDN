<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Rate;
use App\Models\ProductAttribute;
use App\Models\CouponProgram;

class Product extends Model
{
    /**
     * fill into table products
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'size',
        'price',
        'category_id',
        'barcode',
        'rate_point',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function rates()
    {
        return $this->hasMany('Rate');
    }

    public function productAttributes()
    {
        return $this->hasMany('ProductAttribute');
    }

    public function couponPrograms()
    {
        return $this->hasMany('CouponProgram');
    }
}
