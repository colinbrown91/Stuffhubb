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
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * @var product - current product
	 * @return Response
	 *  with @var product
	 */
	public function create($product_id)
	{
		$product = Product::findOrFail($product_id);
		return View::make('photos.create')->withProduct($product);
	}

	/**
	 * Store a newly created resource in storage.
	 * @param product_id	- current product's id
	 * @var product 	- current product
	 * @var photos 		- array of current photos under this product
	 * @var file 		- file to upload
	 * @var filename 	- original filename of @var file
	 * @var extension 	- original extension of @var file
	 * @var rules 		- array of rules for validation
	 * @var validator 	- validation of @var file
	 * @var photo 		- new photo object created for this product
	 * @return Response
	 */
	public function store($product_id)
	{
		$rules = array( // validation rules
			'file_0' => 'required|max:1000|mimes:jpeg,gif,png,tiff' // max size is in kb
		);
		$validator = Validator::make(Input::all(), $rules); // pass input to validator
		if($validator->fails()){ // test if input fails validation
			return Redirect::route('products.photos.create', [$product->id])
				->withErrors($validator)
				->withInput();
		}
		$product = Product::findOrFail($product_id); // retrieve product that photo will belong to
		$photos = $product->productPhotos()->get(); // retrieve current product photos
		if(count($photos) >= 3){ // If there are three or more photos for this product do not upload
			return Redirect::route('products.show', $product->id)
				->withMessage('This product has too many photos. Delete a photo before adding a new one.');
		}
		else { // upload photo
			$file = Request::file('file_0'); // Use Request with Illuminate\Support\Facades\Request;		

			// Resizing Image Testing

			$filename = $file->getClientOriginalName(); // Get filename
			$extension = $file->getClientOriginalExtension(); // Retrieve file extension

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
	 * @param  int  $product_id - current product's id
	 * @param  int  $photo_it 	- current photo's id
	 * @return Response
	 */
	public function destroy($product_id, $photo_id)
	{
		$photo = ProductPhoto::findOrFail($photo_id); // Get photo object
		$photo_filename = $photo->filename; // Get filename to delete in storage
		Storage::disk('productPictures')->delete($photo_filename); // delete file from storage
		$photo->delete(); // delete photo object

		return Redirect::route('products.show', $product_id)
			->withMessage('Photo Deleted');
	}

	/**
	 * Get photo from storage
	 * @param int $photo_id - current photo's id
	 * @var object $photo 	- current photo
	 * @var file $file 		- file associated with current photo
	 */
	public function getPhoto($photo_id)
	{
		// $product = Product::findOrFail($product_id);
		// $product->productPhotos()->get($photo_id);
		
		// return $filename;
		// $photo = ProductPhoto::where('filename', '=', $filename)->firstOrFail();
		$photo = ProductPhoto::findOrFail($photo_id); // Get photo object

		// $photo = ProductPhoto::findOrFail($photo_id);
		$file = Storage::disk('productPictures')->get($photo->filename); // Get file from storage

		// $image = Image::make('$file');

		// $file_path = storage_path().'/app/productImages'.$file;
		// return $photo->mime;
		// return $file;
		// var_dump($file);
		// return $photo->filename;
		// return $photo->filename;
		// var_dump($file);
		// return $file_path;
		// $response = new Response('$file', 200)
		$response = Response::make($file, 200); // Create response with file
		$response->headers->set('Content-type', $photo->mime); // set response headers
		return $response;
			// ->withProduct($product)
			// ->withProductPhoto($photo);
	}

	public function getPhotoTest($product_id)
	{
		$file = Request::file('file_0'); // Use Request with Illuminate\Support\Facades\Request;
		$fileMimeType = $file->getClientMimeType();
		$response = Response::make($file, 200); // Create response with file
		$response->headers->set('Content-type', $fileMimeType); // set response headers
		return 'hello';
		$rules = array( // validation rules
			'file_0' => 'required|max:1000|mimes:jpeg,gif,png,tiff' // max size is in kb
		);
		$validator = Validator::make(Input::all(), $rules); // pass input to validator
		if($validator->fails()){ // test if input fails validation
			return $response;
				// ->withErrors($validator)
				// ->withInput();
		}

		return Redirect::route('products.photos.store', [$product->id])
				->withErrors($validator)
				->withInput();
	}

}
