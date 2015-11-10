<?php namespace App\Http\Controllers;

use View;
use Input;
use Session;
use App\User;
use Redirect;
use App\Tests;
use Validator;
use App\Product;
// use App\Http\Requests;
use App\Models\ItemHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;

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
	 * @param  user_id - current user that product belongs to
	 * @param  CreateProductRequest
	 * @return null - redirect to product index of user
	 */
	public function store($user_id, CreateProductRequest $request)
	{
		// find user for redirect
		$user = User::findOrFail($user_id); 
		// create new product with $request
		$product = Product::create($request->all());
		// set product $user_id with current user's id
		$product->user_id = $user_id;

		$product->save();

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
		// find user for view creation
		$user = User::findOrFail($user_id); 

		$product = Product::findOrFail($product_id);
		// productPhotos() in Product Model
		$photos = $product->productPhotos()->get(); 

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
		// find user for view creation
		$user = User::findOrFail($user_id);
		// find product for view creation
		$product = Product::findOrFail($product_id);
		// productPhotos() in Product Model
		$photos = $product->productPhotos()->get(); 
		
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
	public function update($user_id, $product_id, CreateProductRequest $request)
	{
		// used for redirect
		$user = User::findOrFail($user_id); 
		
		// retrieve existing product to be updated
		$product = Product::findOrFail($product_id);

		$product->update($request->all());

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
		$product = Product::findOrFail($product_id)->delete();

		return Redirect::route('user.products.index', $user_id)
			->withMessage('Product was deleted');
	}

}
