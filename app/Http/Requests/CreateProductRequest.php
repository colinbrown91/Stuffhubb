<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProductRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'product_name' => 'required',
			'product_street' => 'required',
			'product_city' => 'required',
			'product_state' => 'required',
			'product_zipcode' => 'required',
			'base_price_per_hour' => 'required',
			'base_price_per_day' => 'required',
			'base_price_per_week' => 'required',
			'base_price_per_month' => 'required'
		];
	}

}
