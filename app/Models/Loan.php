<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = ["id"];
    protected $appends = ["maturity_date"];
    public function getMaturityDateAttribute()
    {
        return Carbon::parse($this->created_at)->addMonths($this->duration);
    }
}
