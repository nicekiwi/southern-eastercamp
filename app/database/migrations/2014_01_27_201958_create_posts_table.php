<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table)
		{
			$table->increments('id');
			$table->string('fb_id')->unique();
			$table->text('message');
			$table->text('link');
			$table->text('picture');
			$table->text('picture_large');
			$table->text('source');
			$table->text('source_bandcamp');
			$table->text('story');
			$table->text('status_type');
			$table->text('link_desc');
			$table->text('link_name');
			$table->text('link_caption');
			$table->text('type');
			$table->timestamp('posted_at');
			
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
		Schema::drop('posts');
	}

}