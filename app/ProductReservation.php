<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReservation extends Model {

	public function ProductReservationDay()
	{
		return this->hasMany('App\ProductReservationDay');
	}

	public function User()
	{
		return this->belongsTo('User');
	}

}
