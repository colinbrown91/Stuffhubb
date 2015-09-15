<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			//$table->string('user_name');
			$table->integer('user_id');            //lister
			$table->string('product_name', 100);   //100 character limit
			$table->string('product_street', 100);
			$table->string('product_city', 100);
			$table->string('product_state', 100);
			$table->string('product_zipcode', 100);
			$table->float('base_price_per_hour');
			$table->float('base_price_per_day');
			$table->float('base_price_per_week');
			$table->float('base_price_per_month');
			$table->string('original_filename');
			$table->integer('base_availability');
			// $table->integer('max_occupancy');
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
		Schema::drop('products');
	}

}
