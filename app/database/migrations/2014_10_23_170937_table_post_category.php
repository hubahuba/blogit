<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePostCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_post_category', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('id')->on('bi_posts');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')->on('bi_categories');
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
		Schema::drop('bi_post_category');
	}

}
