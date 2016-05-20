<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_creator_id')->unsigned();
            $table->integer('user_creator_id')->unsigned();
            $table->integer('user_recommend_id')->unsigned();
            $table->char('specy_name');
            $table->char('specy_avatar');
            $table->char('specy_description');
            $table->integer('photo_id')->unsigned();
            $table->integer('status');
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
        Schema::drop('species');
    }
}
