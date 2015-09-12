<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	public function update($id)
	{
		//
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
