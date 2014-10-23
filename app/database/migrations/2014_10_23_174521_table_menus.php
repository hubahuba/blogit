<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableMenus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_menus', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('parent')->nullable()->unsigned(); //if null set it mean vertical/displayed menu
            $table->foreign('parent')
                ->references('id')->on('bi_menus');
			$table->string('label', 40)->unique()->nullable();
			$table->integer('position'); //position left to right or top to bottom
            $table->string('object', 16); //object type eg : page, categories, widget
            $table->string('object_id', 16)->nullable(); // the id of object
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
		Schema::drop('bi_menus');
	}

}
