<!-- Explore this option in future -->
<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreProductPhotoRequest extends Request {

	/**
	 * 
	 */
	protected $rules = [
		'file_0' => 'mimes:jpeg,gif,png,tiff'
	];

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		if($this) {

		}
		else return Redirect::route('products.photos.create')->withErrors($validator)->withInput();

		return [
			//
		];
	}

}
