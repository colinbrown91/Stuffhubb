<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCalendar extends Model {

	/**
     * The Product function of this model.
     * ProductCalendars belong to Products.
     * @return this - ProductCalendar that the product belongs to.
     *
	 */
	public function Product()
	{
		return $this->belongsTo('App\Product');
	}

}
