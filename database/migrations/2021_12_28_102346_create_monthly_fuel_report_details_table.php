<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyFuelReportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_fuel_report_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monthly_fuel_report_id')->constrained();
            $table->string('work_type_place')->nullable();
            $table->enum('fuel_type',['diesel','petrol','octane'])->nullable();
            $table->string('meter_reading')->nullable();
            $table->string('distance_per_liter')->nullable();
            $table->string('total_fuel_cost')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('monthly_fuel_report_details');
    }
}
