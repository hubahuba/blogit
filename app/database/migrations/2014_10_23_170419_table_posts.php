<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 254)->unique();
			$table->string('slug', 254)->unique();
			$table->text('post');
            $table->string('lang', 3);
            $table->integer('feature_image')->unsigned();
            $table->foreign('feature_image')
                ->references('id')->on('bi_media');
            $table->integer('creator')->unsigned();
            $table->foreign('creator')
                ->references('id')->on('bi_users');
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
		Schema::drop('bi_posts');
	}

}
