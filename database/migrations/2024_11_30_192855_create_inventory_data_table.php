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
        Schema::create('inventory_data', function (Blueprint $table) {
             $table->id();
            $table->foreignId('inventory_id')->constrained('general_inventories')->cascadeOnDelete();
            $table->integer('sales_agent_salary'); //وكيل المبيعات
            $table->integer('sales_agent'); //وكيل المبيعات
            $table->integer('sales_officer_salary'); // مسؤول المبيعات
            $table->integer('sales_officer');

            $table->integer('sales_manager_salary');
            $table->integer('sales_manager');

            $table->integer('marketing_manager_salary'); // مدير التسويق
            $table->integer('marketing_manager'); // مدير التسويق

            $table->integer('technical_director_salary'); //المدير التقني
            $table->integer('technical_director'); //المدير التقني
            $table->integer('CFO_salary'); //المدير المالي
            $table->integer('CFO'); //المدير المالي
            $table->integer('CEO_salary'); // المدير التنفيذي

            $table->integer('CEO'); // المدير التنفيذي
            $table->integer('hr_manager_salary');
            $table->integer('hr_manager');

            // $table->string("setting_cost");
            // $table->string("setting_salary");
            
            $table->integer("marketing_level1");
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
        Schema::dropIfExists('inventory_data');
    }

};