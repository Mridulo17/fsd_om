<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachStaffRecordDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attach_staff_record_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attach_staff_record_id')->constrained();
            $table->foreignId('employee_id')->nullable()->constrained();
            $table->foreignId('designation_id')->nullable()->constrained();
            $table->foreignId('main_fire_station_id')->nullable()->constrained('fire_stations');
            $table->foreignId('attach_fire_station_id')->nullable()->constrained('fire_stations');
            $table->string('total_attendance_days')->nullable();
            $table->string('total_absent_days')->nullable();
            $table->string('ml_el_rl')->nullable();
            $table->string('salary_workday')->nullable();
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
        Schema::dropIfExists('attach_staff_record_details');
    }
}
