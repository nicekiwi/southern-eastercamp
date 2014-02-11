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
			$table->integer('order')->nullable();
			$table->string('url')->unique();
			$table->string('title')->nullable();
			$table->integer('size')->nullable();
			$table->integer('public')->nullable();

			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			
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