<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('families', function($table){
            $table->foreign('specy_id')->references('id')->on('species');
            $table->foreign('admin_creator_id')->references('id')->on('users');
            $table->foreign('user_creator_id')->references('id')->on('users');
            $table->foreign('user_recommend_id')->references('id')->on('users');
            $table->foreign('photo_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('families', function (Blueprint $table) {
            //
        });
    }
}
