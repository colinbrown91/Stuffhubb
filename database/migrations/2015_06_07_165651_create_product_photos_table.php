<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_photos', function(Blueprint $table)
		{
			$table->increments('id');
			//$table->string('user_name');
			$table->integer('product_id');
			$table->string('filename');
			$table->string('mime');
			$table->string('original_filename');
			$table->dateTime('completed_on')->nullable();
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
		Schema::drop('product_photos');
	}

}
