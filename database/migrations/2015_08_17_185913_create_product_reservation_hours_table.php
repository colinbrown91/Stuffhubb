<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReservationHoursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_reservation_hours', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id');
			$table->integer('reservation_id');
			$table->float('rate');
			$table->date('hour');
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
		Schema::drop('product_reservation_hours');
	}

}
