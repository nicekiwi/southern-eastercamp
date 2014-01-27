<?php

use Illuminate\Database\Migrations\Migration;

class SetForeignKeyOnPhotos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photos', function($table)
		{
			$table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('photos', function($table)
		{
			$table->dropForeign('photos_album_id_foreign');
		});
	}

}