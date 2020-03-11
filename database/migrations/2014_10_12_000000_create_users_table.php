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
            $table->string('name');
            $table->string('avatar')->default('default-peserta.png');
            $table->string('district')->nullable();
            $table->date('birthdate');
            $table->boolean('is_admin');
            $table->enum('gender', ['putera', 'puteri']);
            $table->string('password');
            $table->string('status')->nullable()->default('Baru');
            $table->integer('participant_no')->default(0);
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
