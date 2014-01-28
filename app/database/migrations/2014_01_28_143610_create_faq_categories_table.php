<?php

use Illuminate\Database\Migrations\Migration;

class CreateFaqCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faq_categories', function($table)
		{
			$table->increments('id');
			$table->text('title')->nullable();
			$table->string('count');
			$table->integer('order');
			
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
		Schema::drop('faq_categories');
	}

}