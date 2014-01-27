<?php

use Illuminate\Database\Migrations\Migration;

class CreateFaqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faq', function($table)
		{
			$table->increments('id');
			$table->string('category');
			$table->text('question');
			$table->text('answer');
			$table->string('views');
			$table->integer('helpful_yes');
			$table->integer('helpful_no');
			
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
		Schema::drop('faq');
	}

}