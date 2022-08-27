<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name");
            $table->integer("amount");
            $table->integer("units");
            $table->foreignIdFor(\App\Models\inventory::class);
            $table->foreignIdFor(\App\Models\Merchant::class);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }
};
