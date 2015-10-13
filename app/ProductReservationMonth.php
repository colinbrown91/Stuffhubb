<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReservationMonth extends Model {

	/**
     * The productReservation function of this model.
     * ProductReservationMonths belong to ProductReservations.
     * @return this - ProductReservation that the ProductReservationMonth belongs to.
     *
	 */
	public function productReservation()
	{
		return $this->belongsTo('App\ProductReservation');
	}

	/**
     * The Product function of this model.
     * ProductReservationMonths belong to Products.
     * @return this - Product that the ProductReservationMonth belongs to.
     *
	 */
	public function Product()
	{
		return $this->belongsTo('App\Product');
	}

}
