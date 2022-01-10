<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('role_id')->nullable()->constrained();
            $table->string('name')->nullable();
            $table->string('bn_name')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('nid')->nullable()->unique();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->date('dob')->nullable();
            $table->enum('status', ['Active', 'Inactive']);
            $table->enum('permission_as_role', ['Yes', 'No'])->default('Yes');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
