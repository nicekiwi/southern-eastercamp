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
			$table->text('message')->nullable();
			$table->text('link')->nullable();
			$table->text('picture')->nullable();
			$table->text('picture_large')->nullable();
			$table->text('source')->nullable();
			$table->text('source_bandcamp')->nullable();
			$table->text('story')->nullable();
			$table->text('status_type')->nullable();
			$table->text('link_desc')->nullable();
			$table->text('link_name')->nullable();
			$table->text('link_caption')->nullable();
			$table->text('type')->nullable();
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