<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function($table)
		{
			$table->increments('id');
			$table->integer('album_id')->unsigned();
			$table->string('fb_album_id');
			$table->string('fb_photo_id');
			$table->string('width');
			$table->string('height');
			$table->string('picture')->unique();
			
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
		Schema::drop('photos');
	}

}