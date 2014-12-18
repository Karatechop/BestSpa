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
			$table->integer('salon_id')->unsigned();
			$table->integer('kind_id')->unsigned();
			$table->integer('type_id')->unsigned();
			$table->integer('duration');
			$table->decimal('price', 6, 2);
			$table->boolean('part');
			$table->text('description');
			
			
			# Define foreign keys...
			$table->foreign('salon_id')->references('id')->on('salons');
			$table->foreign('kind_id')->references('id')->on('kinds');
			$table->foreign('type_id')->references('id')->on('types');
			

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
