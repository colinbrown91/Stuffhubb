<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCalendar extends Model {

	public function Product()
	{
		return this->hasOne('App\Product');
	}

}
