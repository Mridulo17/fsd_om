<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachStaffRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attach_staff_records', function (Blueprint $table) {
            $table->id();
            $table->string('memorandum_no_extension',40)->nullable();
            $table->date('date')->nullable();
            $table->foreignId('to_employee_id')->nullable()->constrained('employees');
            $table->string('month',40)->nullable();
            $table->foreignId('from_employee_id')->nullable()->constrained('employees');
            $table->foreignId('from_designation_id')->nullable()->constrained('designations');
            $table->foreignId('from_fire_station_id')->constrained('fire_stations');
            $table->foreignId('thana_id')->nullable()->constrained();
            $table->foreignId('from_district_id')->nullable()->constrained('districts');
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
        Schema::dropIfExists('attach_staff_records');
    }
}
