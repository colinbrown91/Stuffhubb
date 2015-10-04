<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\User;
use App\Tests;

use View;
use Input;
use Redirect;
use Validator;
use Session;
use App\Models\ItemHelper;

class ProductController extends Controller {

	/**
	 * Function to require csrf token.
	 * Will run everytime we enter the controller.
	 * route methods that require token - post, put
	 * 
	 */
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post', 'put'));
	}

	/**
	 * Display a listing of the resource.
	 * @var products - all products
	 * @return Response
	 *  with @var products
	 */
	public function index($user_id)
	{
		$user = User::findOrFail($user_id);
		$products = $user->products()->get();
		return View::make('products.index')
			->with('products', $products)
			->withUser($user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($user_id)
	{
		$user = User::findOrFail($user_id);
		return View::make('products.create')
			->withUser($user);
	}


	/**
	 * Store a newly created resource in storage.
	 * @var array $rules 			- rules for product validation
	 * @var validator $validator 	- validator for product objects
	 * @var string $product_name 	- input product name
	 * @var string $product_base_price 	- input product base_price
	 * @var object $product 		- new product object
	 * @return Response
	 *  with message
	 */
	public function store($user_id)
	{
		// retrieve user that product will belong to
		$user = User::findOrFail($user_id); 
		// Validation
		// define rules
		$rules = array(
			'product_name' => 'required',
			'product_street' => 'required',
			'product_city' => 'required',
			'product_state' => 'required',
			'product_zipcode' => 'required',
			'base_price_per_hour' => 'required',
			'base_price_per_day' => 'required',
			'base_price_per_week' => 'required',
			'base_price_per_month' => 'required'
		);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if($validator->fails()){
			// $messages = $validator->messages();
			// return $messages;
			return Redirect::route('user.products.create')
				->withErrors($validator)
				->withInput();
		}

		/** 
		 * the following line is for testing purposes
		 * to see all input from form
		 * return Input::all();
		 */

		/**
		 * Do we care about validation?
		 * What would we want to validate?
		 * Can products have the same names?
		 * I'd say we would allow products with the 
		 * same name, but maybe not
		 */

		// Get inputs from form
		$product_name = Input::get('product_name');
		$product_street = Input::get('product_street');
		$product_city = Input::get('product_city');
		$product_state = Input::get('product_state');
		$product_zipcode = Input::get('product_zipcode');
		$product_base_price_per_hour = Input::get('base_price_per_hour');
		$product_base_price_per_day = Input::get('base_price_per_day');
		$product_base_price_per_week = Input::get('base_price_per_week');
		$product_base_price_per_month = Input::get('base_price_per_month');
		// $file = Request::file('file_0');
		// $product_picture_filename = $file->getClientOriginalName();
		// $product_picture_0_url = asset(Input::get('picture_0'));
		// FileUploadTest::fileUpload($product_picture_0_url);

		// Create new Product
		$product = new Product();

		// Set variables of new Product to values received from input form
		// Name
		$product->product_name = $product_name;
		// Address
		$product->product_street = $product_street;
		$product->product_city = $product_city;
		$product->product_state = $product_state;
		$product->product_zipcode = $product_zipcode;
		// base_price hour, day, week, month
		$product->base_price_per_hour = $product_base_price_per_hour;
		$product->base_price_per_day = $product_base_price_per_day;
		$product->base_price_per_week = $product_base_price_per_week;
		$product->base_price_per_month = $product_base_price_per_month;
		// User
		$product->user_id = $user->id;
		// Picture URLs
		// $product->original_filename = $product_picture_filename;
		// Save 
		$product->save();
		// Upload photos
		// Redirect::route('products.files.store');
		// Redirect to Index View with successful creation message
		// return Redirect::route('user.products.index', $user->id)
			// ->withMessage('Product was created!');
		return Redirect::route('user.products.show', [$user->id, $product->id])
			->withMessage('Product was created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 *  with @var product
	 *  with @var photos
	 */
	public function show($user_id, $product_id)
	{
		$user = User::findOrFail($user_id);
		$product = Product::findOrFail($product_id);
		$photos = $product->productPhotos()->get(); // productPhotos() in Product Model
		return View::make('products.show')
			->withUser($user)
			->withProduct($product)
			->withPhotos($photos);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @var product
	 * @return Response
	 *  with @var product
	 */
	public function edit($user_id, $product_id)
	{
		$user = User::findOrFail($user_id);
		$product = Product::findOrFail($product_id);
		$photos = $product->productPhotos()->get(); // productPhotos() in Product Model
		return View::make('products.edit')
			->withUser($user)
			->withProduct($product)
			->withPhotos($photos);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($user_id, $product_id)
	{
		// retrieve user that product will belong to
		$user = User::findOrFail($user_id);
		// retrieve existing product to be updated
		$product = Product::findOrFail($product_id);
		// Validation
		// define rules
		$rules = array(
			'product_name' => 'required',
			'product_street' => 'required',
			'product_city' => 'required',
			'product_state' => 'required',
			'product_zipcode' => 'required',
			'base_price_per_hour' => 'required',
			'base_price_per_day' => 'required',
			'base_price_per_week' => 'required',
			'base_price_per_month' => 'required'
		);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if($validator->fails()){
			// $messages = $validator->messages();
			// return $messages;
			return Redirect::route('user.products.create')
				->withErrors($validator)
				->withInput();
		}

		/** 
		 * the following line is for testing purposes
		 * to see all input from form
		 * return Input::all();
		 */

		/**
		 * Do we care about validation?
		 * What would we want to validate?
		 * Can products have the same names?
		 * I'd say we would allow products with the 
		 * same name, but maybe not
		 */

		// Get inputs from form
		$product_name = Input::get('product_name');
		$product_street = Input::get('product_street');
		$product_city = Input::get('product_city');
		$product_state = Input::get('product_state');
		$product_zipcode = Input::get('product_zipcode');
		$product_base_price_per_hour = Input::get('base_price_per_hour');
		$product_base_price_per_day = Input::get('base_price_per_day');
		$product_base_price_per_week = Input::get('base_price_per_week');
		$product_base_price_per_month = Input::get('base_price_per_month');
		// $file = Request::file('file_0');
		// $product_picture_filename = $file->getClientOriginalName();
		// $product_picture_0_url = asset(Input::get('picture_0'));
		// FileUploadTest::fileUpload($product_picture_0_url);

		// Set variables of new Product to values received from input form
		// Name
		$product->product_name = $product_name;
		// Address
		$product->product_street = $product_street;
		$product->product_city = $product_city;
		$product->product_state = $product_state;
		$product->product_zipcode = $product_zipcode;
		// base_price hour, day, week, month
		$product->base_price_per_hour = $product_base_price_per_hour;
		$product->base_price_per_day = $product_base_price_per_day;
		$product->base_price_per_week = $product_base_price_per_week;
		$product->base_price_per_month = $product_base_price_per_month;
		// User
		$product->user_id = $user->id;
		// Picture URLs
		// $product->original_filename = $product_picture_filename;
		// Update
		$product->update();
		// Upload photos
		// Redirect::route('products.files.store');
		// Redirect to Index View with successful creation message
		return Redirect::route('user.products.show', [$user->id, $product->id])
			->withMessage('Product was updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @var product
	 * @return Response
	 *  with message
	 */
	public function destroy($user_id, $product_id)
	{
		$product = Product::findOrFail($product_id);
		$photos = $product->productPhotos()->delete(); // productPhotos() in Product Model
		$product->delete();
		return Redirect::route('user.products.index', $user_id)
			->withMessage('Product was deleted');
	}

}
