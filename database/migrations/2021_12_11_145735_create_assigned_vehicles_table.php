<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_no')->nullable();
            $table->foreignId('type_id');
            $table->foreignId('category_id')->nullable();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->foreignId('model_id')->nullable()->constrained();
            $table->foreignId('fire_station_id')->nullable()->constrained();
            $table->foreignId('division_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('thana_id')->nullable()->constrained();
            $table->string('registration_number')->nullable();
            $table->string('name')->nullable();
            $table->string('bn_name')->nullable();
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
        Schema::dropIfExists('assigned_vehicles');
    }
}
