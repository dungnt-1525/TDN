<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    /**
     * fill into table roles
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function users() {
        return $this->hasMany('User');
    }
}
