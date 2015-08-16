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
			$table->float('base_price');
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
