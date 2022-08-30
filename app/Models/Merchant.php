<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class Merchant extends Authenticatable
{
    public $appends = ["total_profit","total_cost","total_revenue","total_sales"];
    public function inventory()
    {
        return $this->hasMany(inventory::class);
    }
    public function staff()
    {
        return $this->hasMany(staff::class);
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
    public function getTotalCostAttribute()
    {
        return $this->inventory()->get()->sum("real_cost");
    }
    public function getTotalRevenueAttribute()
    {
        return $this->purchase()->sum("amount");
    }
    public function  getTotalSalesAttribute()
    {
        return $this->purchase()->sum("units");
    }
    public function getTotalProfitAttribute()
    {
        return $this->total_revenue - $this->total_cost;
    }
}
