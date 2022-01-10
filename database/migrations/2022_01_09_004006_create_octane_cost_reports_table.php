<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOctaneCostReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('octane_cost_reports', function (Blueprint $table) {
            $table->id();
            $table->string('month',40)->nullable();
            $table->foreignId('employee_id')->nullable()->constrained();
            $table->foreignId('designation_id')->nullable()->constrained();
            $table->foreignId('fire_station_id')->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('thana_id')->nullable()->constrained();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('octane_cost_reports');
    }
}
