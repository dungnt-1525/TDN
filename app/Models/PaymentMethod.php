<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class PaymentMethod extends Model
{
    /**
     * fill into table payment_methods
     * @var array
     */
    protected $fillable = [
        'name', 'status',
    ];

    public function orders()
    {
        return $this->belongsTo('Order');
    }
}
