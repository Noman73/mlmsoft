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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('adress')->nullable();
            $table->string('phone');
            $table->string('nid')->nullable();
            $table->string('dateofbirth');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('refferance_id')->nullable();
            $table->unsignedBigInteger('uplink_id')->nullable();
            $table->tinyInteger('position')->nullable();
            $table->string('pin_no')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->rememberToken();
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
