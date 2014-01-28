<?php

use Illuminate\Database\Migrations\Migration;

class SetForeignKeyOnVideos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('videos', function($table)
		{
			$table->foreign('playlist_id')->references('id')->on('playlists')->onUpdate('cascade')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('videos', function($table)
		{
			$table->dropForeign('videos_playlist_id_foreign');
		});
	}

}