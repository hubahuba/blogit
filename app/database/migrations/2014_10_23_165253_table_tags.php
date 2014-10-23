<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_tags', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name', 128)->unique();
            $table->string('slug', 128)->unique();
            $table->text('description');
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
		Schema::drop('bi_tags');
	}

}
