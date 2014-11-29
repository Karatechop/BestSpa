<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salon_service', function($table) {

			# AI, PK
			# none needed

			# General data...
			$table->integer('salon_id')->unsigned();
			$table->integer('service_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('salon_id')->references('id')->on('salons');
			$table->foreign('service_id')->references('id')->on('services');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
