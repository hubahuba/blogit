<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTemplates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_templates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 60)->unique();
			$table->text('file'); //layout file name
			$table->string('object'); //object for each column of layout
			$table->integer('object_id')->nullable(); //if object registered on database
			$table->integer('position'); //position base on layout file
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
		Schema::drop('bi_templates');
	}

}
