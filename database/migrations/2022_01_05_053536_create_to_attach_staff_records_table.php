<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToAttachStaffRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_attach_staff_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attach_staff_record_id')->constrained();
            $table->foreignId('to_fire_station_id')->nullable()->constrained('fire_stations');
            $table->foreignId('to_district_id')->nullable()->constrained('districts');
            $table->foreignId('to_designation_id')->nullable()->constrained('designations');
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
        Schema::dropIfExists('to_attach_staff_records');
    }
}
