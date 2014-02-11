<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFulltextToQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//DB::raw('create index qsearch on questions (question)');
		DB::raw('CREATE INDEX question_fulltext_idx ON questions USING gin(to_tsvector("english", question))');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questions', function($table) {
		    $table->dropIndex('qsearch');
		});
	}

}
