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
			$table->text('question')->nullable();
			$table->text('answer')->nullable();
			$table->text('tags')->nullable();
			$table->string('views')->nullable();
			$table->integer('helpful_yes')->nullable();
			$table->integer('helpful_no')->nullable();
			$table->integer('order')->nullable();
			$table->integer('public')->nullable();

			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
			
			$table->timestamps();

			$table->foreign('category_id')->references('id')->on('question_categories')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
		});

		// Add fulltext index to Questions table
		DB::unprepared('ALTER TABLE questions ADD FULLTEXT INDEX SEARCH(question,tags)');
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