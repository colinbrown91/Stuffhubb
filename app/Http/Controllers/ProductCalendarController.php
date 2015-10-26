<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\CalendarController;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\ProductCalendar;
use View;
use Input;

class ProductCalendarController extends Controller {

	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function setPriceInDateRangeForProduct(Request $request)
	{
		$product = $request['product'];
		$price = $request['price'];
		echo $start_date_time = $request['start_date_time'];
		echo $end_date_time = $request['end_date_time'];
		echo $date_time = date("Y-m-d H", strtotime($start_date_time));
		echo Carbon::createFromFormat("Y-m-d H", $date_time);
		echo $date_time_end = date("Y-m-d H", strtotime($end_date_time));

		echo $date_day = date("Y-m-d", strtotime($start_date_time));
		// echo $diff_in_days = $date_time_end->diffInDays($date_time, false);
		// echo $diff_in_days_true = $end_date_time->diffInDays($start_date_time, true);

		$base_product = Product::findOrFail($product);

		$num=0;

		while(strtotime($date) <= strtotime($end_date_time))
		{
			$product_day = ProductCalendar::firstOrNew(array('product_id' => $product, 'day' => $date));

			if(!$product_day->id)
			{
				$product_day->availability = $base_product->base_availability;
			}

			$product_day->rate = $price;
			// $product_day->save();
			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
			$num++;
		}
		return null;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Create new event in calendar
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store not used because calendar already exists
	 * See Update
	 *
	 * @return Response
	 */
	public function store($product_id)
	{
		// Not Used
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($product_id, $calendar_id)
	{
		$product = Product::findOrFail($product_id);
		$calendar = ProductCalendar::findOrFail($calendar_id);
		echo $calendar->generate();
		// return View::make('reservations.rent')
		// 	->withProduct($product)
		// 	->withCalendar($calendar);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($product_id, $calendar_id)
	{
		$product = Product::findOrFail($product_id);
		$calendar = ProductCalendar::findOrFail($calendar_id);
		
		// Carbon::createFromFormat('Y-m-d', Input::get('start_date'))
		$reservation_day = Carbon::createFromFormat('Y-m-d', Input::get('start_date'));
		$reservation_length = Input::get('reservation_length');
		switch($reservation_length) {
			case 'rent_by_hour':
				dd('Hour Case');
			case 'rent_by_day':
				dd('Day Case');
			case 'rent_by_week':
				dd('Week Case');
			case 'rent_by_month':
				dd('Month Case');
		};
		dd($reservation_length);
		// return Redirect::route('reservations.show', [$product_id, $calendar_id])->withMessage('checking calendar');
		// $events = array('$reservation_day' => array('Reservation 1'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	
}
