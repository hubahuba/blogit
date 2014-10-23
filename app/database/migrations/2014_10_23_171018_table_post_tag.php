<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePostTag extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_post_tag', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('id')->on('bi_posts');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')
                ->references('id')->on('bi_tags');
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
		Schema::drop('bi_post_tag');
	}

}
