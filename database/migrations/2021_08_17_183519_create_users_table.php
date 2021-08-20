<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status');
            $table->string('remember_token', 100)->nullable(true);
            $table->string('user_name')->nullable(true);
            $table->string('job_title')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('online_status')->nullable(true);
            $table->string('avatar')->nullable(true);
            $table->string('vk')->nullable(true);
            $table->string('telegram')->nullable(true);
            $table->string('instagram')->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
