<?php

use Illuminate\Database\Migrations\Migration;

class CreateWallpapersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wallpapers', function($table)
		{
			$table->increments('id');
			$table->integer('order');
			$table->string('url')->unique();
			$table->string('desc');
			$table->integer('size');
			
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
		Schema::drop('wallpapers');
	}

}