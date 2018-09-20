<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttribute;
use App\Models\Order;

class OrderDetail extends Model
{
    /**
     * fill into table orders_detail
     * @var array
     */
    protected $fillable = [
        'quantity',
        'price_sale',
        'order_id',
        'product_attributes_id',
        'status',
    ];

    public function productAttributes()
    {
        return $this->belongsTo('ProductAttribute');
    }

    public function order()
    {
        return $this->belongsTo('Order');
    }
}
