<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_setting_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('general_inventories')->cascadeOnDelete();
            $table->string("title");
            $table->string("cost");
            $table->string("salary");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_setting_data');
    }
};
