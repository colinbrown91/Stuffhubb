<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReservationDay extends Model {

	public function ProductReservation()
	{
		return this->hasOne('ProductReservation');
	}

	public function Product()
	{
		return this->hasOne('Product');
	}

}
