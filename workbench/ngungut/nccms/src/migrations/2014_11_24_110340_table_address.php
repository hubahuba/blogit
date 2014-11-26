<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAddress extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bi_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('label', 128);
			$table->string('company', 128);
			$table->string('phone', 25)->nullable();
			$table->string('fax', 25)->nullable();
			$table->string('email', 128)->nullable();
			$table->text('address');
			$table->text('map_url')->nullable();
			$table->string('status', 3);
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
		Schema::drop('bi_addresses');
	}

}
