<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReservationDay extends Model {

	/**
     * The productReservation function of this model.
     * ProductReservationDays belong to ProductReservations.
     * @return this - ProductReservation that the ProductReservationDay belongs to.
     *
	 */
	public function productReservation()
	{
		return $this->belongsTo('App\ProductReservation');
	}

	/**
     * The Product function of this model.
     * ProductReservationDays belong to Products.
     * @return this - Product that the ProductReservationDay belongs to.
     *
	 */
	public function Product()
	{
		return $this->belongsTo('App\Product');
	}

}
