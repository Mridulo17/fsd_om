<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOctaneCostReportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('octane_cost_report_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('octane_cost_report_id')->constrained();
            $table->string('previous_report')->nullable();
            $table->string('purchase_formula')->nullable();
            $table->string('purchase_source')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('purchase_amount_liters')->nullable();
            $table->string('total_amount_liters')->nullable();
            $table->date('issue_date')->nullable();
            $table->string('godiva_pump')->nullable();
            $table->string('angus_pump')->nullable();
            $table->string('firman_generator')->nullable();
            $table->string('honda_generator')->nullable();
            $table->string('smoke_ejector')->nullable();
            $table->string('rotary_rescue_saw')->nullable();
            $table->string('eli_generator')->nullable();
            $table->string('two_wheeler')->nullable();
            $table->string('maintenance_work_issue')->nullable();
            $table->string('others')->nullable();
            $table->string('operational_work_issue')->nullable();
            $table->string('administrative_work_issue')->nullable();
            $table->string('total_cost_liter')->nullable();
            $table->string('remaining')->nullable();
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
        Schema::dropIfExists('octane_cost_report_details');
    }
}
