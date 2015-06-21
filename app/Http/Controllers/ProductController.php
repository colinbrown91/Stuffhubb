<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\Tests;
// use FileUploadTest;

use View;
use Input;
use Redirect;
use Validator;
use Session;

class ProductController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post', 'put'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
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
	 *
	 * @return Response
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
			return Redirect::route('todos.create')->withErrors($validator)->withInput();
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
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		// var_dump($product);
		$photos = $product->productPhotos()->get();
		// var_dump($pictures);
		// return $photos;
		return View::make('products.show')
			->withProduct($product)
			->withPhotos($photos);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
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
			return Redirect::route('todos.create')->withErrors($validator)->withInput();
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
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id)->delete();

		return Redirect::route('products.index')->withMessage('Item Deleted');
	}

}
