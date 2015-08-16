<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_reservations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('total_price');
			// $table->integer('occupancy');  //How many users
			$table->date('checkin');
			$table->date('checkout');
			$table->string('user_id');     //renter
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
		Schema::drop('product_reservations');
	}

}
