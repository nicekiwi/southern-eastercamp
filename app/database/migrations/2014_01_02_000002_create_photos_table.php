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
			$table->string('fb_album_id')->nullable();
			$table->string('fb_photo_id')->nullable();
			$table->string('width')->nullable();
			$table->string('height')->nullable();
			$table->string('picture')->unique();
			
			$table->timestamps();

			$table->foreign('album_id')->references('id')->on('albums')->onUpdate('cascade')->onDelete('cascade');
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