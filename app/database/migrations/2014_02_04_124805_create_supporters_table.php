<?php

use Illuminate\Database\Migrations\Migration;

class CreateSupportersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supporters', function($table)
		{
			$table->integer('id')->increment();
			$table->string('title');
			$table->string('slug');
			$table->string('url');

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
		Schema::drop('supporters');
	}

}