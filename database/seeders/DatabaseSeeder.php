<?php

namespace Database\Seeders;

use App\Models\inventory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        inventory::factory()->count(30)->create();
    }
}
