<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salons', function($table) {

			# AI, PK
			$table->increments('id');

			# created_at, updated_at columns
			$table->timestamps();

			# General data...
			$table->string('name', 20);
			$table->string('city', 20);
			$table->string('address', 50);
			$table->integer('open_h');
			$table->string('open_m', 2);
			$table->integer('close_h');
			$table->string('close_m', 2);
			$table->string('int_code', 2);
			$table->string('coun_code', 4);
			$table->string('net_code', 3);
			$table->string('phone', 10);
			$table->string('url', 30);
			
			# Define foreign keys...
			# none needed

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('salons');
	}

}
