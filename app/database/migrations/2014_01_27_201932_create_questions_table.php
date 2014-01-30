<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function($table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned()->nullable();
			$table->text('question');
			$table->text('answer');
			$table->string('views');
			$table->integer('helpful_yes');
			$table->integer('helpful_no');
			$table->integer('order');
			$table->integer('public');
			
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
		Schema::drop('questions');
	}

}