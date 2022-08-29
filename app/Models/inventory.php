<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $guarded=["id"];
    protected $appends = ["units_sold","revenue","profit","units_left","real_cost"];
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
    public function getUnitsSoldAttribute()
    {
        return $this->purchase()->sum("units");
    }
    public function getRealCostAttribute()
    {
        return $this->cost * $this->units;
    }
    public function getUnitsLeftAttribute()
    {
        return $this->units - $this->units_sold;
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
