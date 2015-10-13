<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReservationWeek extends Model {

	/**
     * The productReservation function of this model.
     * ProductReservationWeeks belong to ProductReservations.
     * @return this - ProductReservation that the ProductReservationWeek belongs to.
     *
	 */
	public function productReservation()
	{
		return $this->belongsTo('App\ProductReservation');
	}

	/**
     * The Product function of this model.
     * ProductReservationWeeks belong to Products.
     * @return this - Product that the ProductReservationWeek belongs to.
     *
	 */
	public function Product()
	{
		return $this->belongsTo('App\Product');
	}

}
