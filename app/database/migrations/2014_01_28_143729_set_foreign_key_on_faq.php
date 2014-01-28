<?php

use Illuminate\Database\Migrations\Migration;

class SetForeignKeyOnFaq extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('faq', function($table)
		{
			$table->foreign('category_id')->references('id')->on('faq_categories')->onUpdate('cascade')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('faq', function($table)
		{
			$table->dropForeign('faq_category_id_foreign');
		});
	}
}