<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationalMaintenanceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operational_maintenance_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operational_maintenance_report_id');
            $table->foreign('operational_maintenance_report_id','omr_id_fk')->references('id')->on('operational_maintenance_reports')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('date');
            $table->string('fire_accident_place')->nullable();
            $table->foreignId('fire_accident_reason_id')->constrained();
            $table->foreignId('damaged_property_id')->nullable()->constrained();
            $table->foreignId('accident_type_id')->nullable()->constrained();
            $table->string('probable_damage_amount')->nullable();
            $table->string('probable_rescue_amount')->nullable();
            $table->string('people_injury')->nullable();
            $table->string('people_died')->nullable();
            $table->string('animals_injury')->nullable();
            $table->string('animals_died')->nullable();
            $table->string('employee_injury')->nullable();
            $table->string('employee_died')->nullable();
            $table->foreignId('assigned_vehicle_id')->nullable()->constrained();
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
        Schema::dropIfExists('operational_maintenance_details');
    }
}
