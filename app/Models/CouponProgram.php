<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Coupon;

class CouponProgram extends Model
{
    /**
     * fill into table coupon_program
     * @var array
     */
    protected $fillable = [
        'product_id', 'coupon_id', 'status'
    ];

    public function product()
    {
        return $this->belongsTo('Product');
    }

    public function coupon()
    {
        return $this->belongsTo('Coupon');
    }
}
