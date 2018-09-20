<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttribute;

class Color extends Model
{
    /**
     * fill into table colors
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];

    public function productAttributes()
    {
        return $this->hasMany('ProductAttribute');
    }
}
