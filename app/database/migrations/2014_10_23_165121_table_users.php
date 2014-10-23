<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username', 30);
            $table->string('password', 60);
            $table->string('firstname', 60);
            $table->string('lastname', 60);
            $table->string('nickname', 60);
            $table->integer('level');
            $table->integer('creator')->unsigned()->nullable();
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
		Schema::drop('bi_users');
	}

}
