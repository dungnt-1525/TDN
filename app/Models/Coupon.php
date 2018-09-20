<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CouponProgram;

class Coupon extends Model
{
    /**
     * fill into table coupon
     * @var array
     */
    protected $fillable = [
        'code',
        'type',
        'decrease',
        'start_at',
        'end_at',
        'status',
    ];

    public function couponPrograms()
    {
        return $this->hasMany('CouponProgram');
    }
}
