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
			$table->string('count');
			$table->integer('order');

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
		Schema::drop('question_categories');
	}

}