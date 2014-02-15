<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuestionCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_categories', function($table)
		{
			$table->increments('id');
			$table->text('title')->nullable();
			$table->text('slug')->nullable();
			$table->integer('count')->nullable();
			$table->integer('order')->nullable();

			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			
			$table->timestamps();

			$table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question_categories');
	}

}