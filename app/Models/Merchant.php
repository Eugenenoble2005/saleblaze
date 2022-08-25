<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Authenticatable
{
    public function inventory()
    {
        return $this->hasMany(inventory::class);
    }
}
