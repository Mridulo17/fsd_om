<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterRollReportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_roll_report_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_roll_report_id')->constrained();
            $table->foreignId('employee_id')->nullable()->constrained();
            $table->foreignId('designation_id')->nullable()->constrained();
            $table->string('total_attendance_days')->nullable();
            $table->string('total_absent_days')->nullable();
            $table->string('ml_el')->nullable();
            $table->string('rl')->nullable();
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
        Schema::dropIfExists('master_roll_report_details');
    }
}
