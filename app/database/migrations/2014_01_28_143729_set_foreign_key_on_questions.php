<?php

use Illuminate\Database\Migrations\Migration;

class SetForeignKeyOnQuestions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('questions', function($table)
		{
			$table->foreign('category_id')->references('id')->on('question_categories')->onUpdate('cascade')->onDelete('set null');
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
		Schema::table('questions', function($table)
		{
			$table->dropForeign('questions_category_id_foreign');
			$table->dropForeign('questions_created_by_foreign');
			$table->dropForeign('questions_updated_by_foreign');
		});
	}
}