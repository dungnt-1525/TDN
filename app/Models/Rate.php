<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Product;

class Rate extends Model
{
    /**
     * fill into table rate
     * @var array
     */
    protected $fillable = [
        'rate_point', 'user_id', 'product_id', 'status',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function product()
    {
        return $this->belongsTo('Product');
    }
}
