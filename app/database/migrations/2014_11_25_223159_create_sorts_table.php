<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sorts', function($table) {

			# AI, PK
			$table->increments('id');

			# created_at, updated_at columns
			$table->timestamps();

			# General data...
			$table->string('name');
			
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
		Schema::drop('sorts');
	}

}
