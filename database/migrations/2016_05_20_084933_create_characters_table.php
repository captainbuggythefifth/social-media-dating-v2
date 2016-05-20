<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharactersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();

			$table->integer('family_id')->unsigned();

            $table->integer('photo_id')->unsigned();
            
			$table->char('character_name');
			$table->char('character_age');
			$table->char('character_avatar');
			$table->char('character_description');
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
        Schema::drop('characters');
    }
}
