<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function($table) {

			# AI, PK
			$table->increments('id');

			# created_at, updated_at columns
			$table->timestamps();

			# General data...
			$table->integer('sort_id')->unsigned();
			$table->string('type');
			$table->integer('duration_id')->unsigned();
			$table->decimal('price');
			$table->boolean('part');
			$table->string('description');
			
			
			# Define foreign keys...
			$table->foreign('sort_id')->references('id')->on('sorts');
			$table->foreign('duration_id')->references('id')->on('durations');
			

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('services');
	}

}
