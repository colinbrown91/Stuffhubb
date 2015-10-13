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
     * The productReservationWeeks function of this model.
     * ProductReservations have many ProductReservationWeeks.
     * @return this - array of ProductReservationWeeks that belong to the ProductReservation.
     *
     */
	public function productReservationWeeks()
	{
		return $this->hasMany('App\ProductReservationWeek');
	}

	/**
     * The productReservationMonths function of this model.
     * ProductReservations have many ProductReservationMonths.
     * @return this - array of ProductReservationMonths that belong to the ProductReservation.
     *
     */
	public function productReservationMonths()
	{
		return $this->hasMany('App\ProductReservationMonth');
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
