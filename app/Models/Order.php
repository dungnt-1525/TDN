<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMethod;

class Order extends Model
{
    /**
     * fill into table orders
     * @var array
     */
    protected $fillable = [
        'user_id',
        'payment_method_id',
        'amount',
        'phone',
        'name',
        'zipcode',
        'status',
    ];

    public function paymentMethod()
    {
        return $this->hasOne('PaymentMethod');
    }
}
