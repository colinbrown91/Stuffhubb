<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReservationHour extends Model {

	/**
     * The productReservation function of this model.
     * ProductReservationHours belong to ProductReservations.
     * @return this - ProductReservation that the ProductReservationHour belongs to.
     *
	 */
	public function productReservation()
	{
		return $this->belongsTo('App\ProductReservation');
	}

	/**
     * The Product function of this model.
     * ProductReservationHours belong to Products.
     * @return this - Product that the ProductReservationHour belongs to.
     *
	 */
	public function Product()
	{
		return $this->belongsTo('App\Product');
	}

}
