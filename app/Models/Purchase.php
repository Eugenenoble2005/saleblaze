<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded=["id"];
    protected $appends = ["inventory"];
    public function inventory()
    {
        return $this->belongsTo(inventory::class);
    }
    public function getInventoryAttribute()
    {
        return $this->inventory()->get();
    }
}
