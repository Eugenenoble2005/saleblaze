<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $guarded=["id"];
    protected $appends = ["units_sold","revenue","profit"];
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
    public function getUnitsSoldAttribute()
    {
        return $this->purchase()->count();
    }
    public function getRevenueAttribute()
    {
        return $this->units_sold * $this->price;
    }
    public function getProfitAttribute()
    {
        return  $this->revenue - ($this->cost * $this->units);
    }
}
