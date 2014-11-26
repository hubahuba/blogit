<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 128)->unique();
			$table->string('slug', 128)->unique();
			$table->string('icon', 128)->nullable();
			$table->text('description')->nullable();
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
		Schema::drop('bi_categories');
	}

}
