<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string("creditor_name");
            $table->integer("amount");
            $table->integer("interest");
            $table->integer("duration");
            $table->boolean("repaid")->default(false);
            $table->foreignIdFor(\App\Models\Merchant::class);
            $table->timestamp("date_repaid")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
