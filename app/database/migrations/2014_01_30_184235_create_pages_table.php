<?php

use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function($table)
		{
			$table->increments('id');

			$table->integer('order')->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_desc')->nullable();
			$table->string('slug')->nullable();

			$table->text('content')->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			
			$table->timestamps();

			$table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}