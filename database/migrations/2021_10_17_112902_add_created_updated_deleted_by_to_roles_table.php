<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedUpdatedDeletedByToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->after('status')->constrained('users');
            $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('users');
            $table->foreignId('deleted_by')->nullable()->after('updated_by')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign(['created_by','foreignId','deleted_by']);
            $table->dropColumn(['created_by','foreignId','deleted_by']);
        });
    }
}
