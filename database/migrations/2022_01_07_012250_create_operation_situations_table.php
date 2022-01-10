<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationSituationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_situations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('situation_report_id')->constrained();
            $table->foreignId('fire_station_id')->nullable()->constrained();
            $table->string('situation_report_problems')->nullable();
            $table->string('recipient_system')->nullable();
            $table->string('next_activities_responsibility')->nullable();
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
        Schema::dropIfExists('operation_situations');
    }
}
