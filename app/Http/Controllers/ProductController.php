<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\Tests;

use View;
use Input;
use Redirect;
use Validator;
use Session;

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
	public function index()
	{
		//
		$products = Product::all();
		return View::make('products.index')
			->with('products', $products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @var array $rules 			- rules for product validation
	 * @var validator $validator 	- validator for product objects
	 * @var string $product_name 	- input product name
	 * @var string $product_price 	- input product price
	 * @var object $product 		- new product object
	 * @return Response
	 *  with message
	 */
	public function store()
	{
		
		// Validation
		// define rules
		$rules = array(
			// 'name' => array('required', 'unique:todo_lists,name')
		);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if($validator->fails()){
			// $messages = $validator->messages();
			// return $messages;
			return Redirect::route('products.create')->withErrors($validator)->withInput();
		}
		// $bool0 = 0;

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

		// Get inputs from create form
		$product_name = Input::get('name');
		$product_price = Input::get('price');
		// $file = Request::file('file_0');
		// $product_picture_filename = $file->getClientOriginalName();
		// $product_picture_0_url = asset(Input::get('picture_0'));
		// FileUploadTest::fileUpload($product_picture_0_url);

		// Create new Product
		$product = new Product();

		// Set variables of new Product to values received from input form
		// Name
		$product->product_name = $product_name;
		// Price
		$product->price = $product_price;
		// Picture URLs
		// $product->original_filename = $product_picture_filename;
		// Save 
		$product->save();
		// Upload photos
		// Redirect::route('products.files.store');
		// Redirect to Index View with successful creation message
		return Redirect::route('products.index')
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
	public function show($id)
	{
		$product = Product::findOrFail($id);
		$photos = $product->productPhotos()->get();
		return View::make('products.show')
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
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		return View::make('products.edit')->withProduct($product);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Validation
		// define rules
		$rules = array(
			// 'name' => array('required', 'unique:todo_lists,name')
		);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if($validator->fails()){
			// $messages = $validator->messages();
			// return $messages;
			return Redirect::route('products.create')->withErrors($validator)->withInput();
		}
		
				// $bool0 = 0;

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

		// Get inputs from create form
		$product_name = Input::get('name');
		$product_price = Input::get('price');
		// $file = Request::file('file_0');
		// $product_picture_filename = $file->getClientOriginalName();
		// $product_picture_0_url = asset(Input::get('picture_0'));
		// FileUploadTest::fileUpload($product_picture_0_url);

		// Create new Product
		$product = Product::findOrFail($id);

		// Set variables of new Product to values received from input form
		// Name
		$product->product_name = $product_name;
		// Price
		$product->price = $product_price;
		// Picture URLs
		// $product->original_filename = $product_picture_filename;
		// Save 
		$product->update();
		// Upload photos
		// Redirect::route('products.files.store');
		// Redirect to Index View with successful creation message
		return Redirect::route('products.index')
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
	public function destroy($id)
	{
		$product = Product::findOrFail($id)->delete();

		return Redirect::route('products.index')->withMessage('Item Deleted');
	}

}
