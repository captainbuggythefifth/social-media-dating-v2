<?php

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('age');
            $table->date('birth_date');
            $table->integer('gender');

            $table->char('user_name');
            $table->char('avatar');
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('current_character_id')->unsigned()->nullable();
            $table->integer('status');
            $table->integer('wall_photo_id')->unsigned()->nullable();
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
        Schema::drop('users');
    }
}
