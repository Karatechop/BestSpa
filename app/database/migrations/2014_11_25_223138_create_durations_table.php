<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDurationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('durations', function($table) {

			# AI, PK
			$table->increments('id');

			# created_at, updated_at columns
			$table->timestamps();

			# General data...
			$table->integer('duration');
			
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
		Schema::drop('durations');
	}

}
