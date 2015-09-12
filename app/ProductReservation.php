<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReservation extends Model {

	/**
     * The productReservationHours function of this model.
     * ProductReservations have many ProductReservationHours.
     * @return this - array of ProductReservationHours that belong to the ProductReservation.
     *
     */
	public function productReservationHours()
	{
		return $this->hasMany('App\ProductReservationHour');
	}
	
	/**
     * The productReservationDays function of this model.
     * ProductReservations have many ProductReservationDays.
     * @return this - array of ProductReservationDays that belong to the ProductReservation.
     *
     */
	public function productReservationDays()
	{
		return $this->hasMany('App\ProductReservationDay');
	}

	/**
     * The User function of this model.
     * ProductReservations belong to Users.
     * @return this - User that the ProductReservation belongs to.
     *
	 */
	public function User()
	{
		return $this->belongsTo('App\User');
	}

}
