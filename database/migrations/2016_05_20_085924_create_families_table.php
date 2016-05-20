<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('specy_id')->unsigned();
            $table->integer('admin_creator_id')->unsigned();
            $table->integer('user_creator_id')->unsigned();
            $table->integer('user_recommend_id')->unsigned();
            $table->char('family_name');
            $table->char('family_avatar');
            $table->char('family_description');
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
        Schema::drop('families');
    }
}
