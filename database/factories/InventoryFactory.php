<?php

namespace Database\Factories;

use App\Models\inventory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InventoryFactory extends Factory
{
    protected $model = inventory::class;

    public function definition(): array
    {
        $cost = [1000000,2000000,3000000,4000000,5000000,6000000];
        $units = [];
        for($x = 1;$x<=20;$x++){
            $units[] = $x;
        }
        return [
            'name' => $this->faker->word()."-good",
            'cost' => $cost[rand(0,5)],
            'price' => $cost[rand(0,5)],
            'units' => $units[rand(0,18)],
            'merchant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
