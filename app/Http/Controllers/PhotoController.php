<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProductPhoto;
use App\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\File;
// use Illuminate\Http\Request;
// use Illuminate\Http\Response;

use League\Glide\Server;

use Response;
use View;
use Input;
use Redirect;
use Validator;
use Session;
use Image;

class PhotoController extends Controller {

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
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($product_id)
	{
		var_dump($product_id);
		$product = Product::findOrFail($product_id);
		// var_dump($product);
		return View::make('photos.create')->withProduct($product);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	// public function store(Request $request)
	public function store($product_id)
	{
		$product = Product::findOrFail($product_id); // retrieve product that photo will belong to

		/* Use Request with Illuminate\Support\Facades\Request; */
		$file = Request::file('file_0');
		
		$filename = $file->getClientOriginalName(); // Get filename
		$extension = $file->getClientOriginalExtension(); // Retrieve file extension

		$rules = array( // validation rules
			'file_0' => 'mimes:jpeg,gif,png,tiff'
		);
		$validator = Validator::make(Input::all(), $rules); // pass input to validator
		if($validator->fails()){ // test if input fails validation
			return Redirect::route('products.photos.create', [$product->id])
				->withErrors($validator)
				->withInput();
		}

		Storage::disk('productPictures')->put($file->getFilename().'.'.$extension, File::get($file)); // store photo
		$photo = new ProductPhoto(); // create new photo object
		$photo->product_id = $product_id; // store product_id
		$photo->mime = $file->getClientMimeType(); // store mime type
		$photo->original_filename = $file->getClientOriginalName(); // store original filename
		$photo->filename = $file->getFilename().'.'.$extension; // store storage filename
		$product->productPhotos()->save($photo); // save photo object

		return Redirect::route('products.show', $product->id)
			->withMessage('Photo Added');
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
	public function edit($product_id, $photo_id)
	{
		// $photo = ProductPhoto::findOrFail($photo_id);
		// return View::make('photos.edit')->withProductPhoto($photo);
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
	public function destroy($product_id, $photo_id)
	{
		$photo = ProductPhoto::findOrFail($photo_id);

		// return $photo;
		$photo_filename = $photo->filename;
		Storage::disk('productPictures')->delete($photo_filename);

		$photo->delete();

		return Redirect::route('products.show', $product_id)
			->withMessage('Photo Deleted');
	}

	public function getPhoto($photo_id)
	{
		// $product = Product::findOrFail($product_id);
		// $product->productPhotos()->get($photo_id);
		
		// return $filename;
		// $photo = ProductPhoto::where('filename', '=', $filename)->firstOrFail();
		$photo = ProductPhoto::findOrFail($photo_id);

		// $photo = ProductPhoto::findOrFail($photo_id);
		$file = Storage::disk('productPictures')->get($photo->filename);

		// $image = Image::make('$file');

		// $file_path = storage_path().'/app/productImages'.$file;
		// return $photo->mime;
		// return $file;
		// var_dump($file);
		// return null;
		// return $photo->filename;
		// return null;
		// return $photo->filename;
		// var_dump($file);
		// return $file_path;
		// $response = new Response('$file', 200)
		$response = Response::make($file, 200);
		$response->headers->set('Content-type', $photo->mime);
		return $response;
			// ->withProduct($product)
			// ->withProductPhoto($photo);
	}

}
