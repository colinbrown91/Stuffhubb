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
		$product = Product::findOrFail($product_id);
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
		
		/* File Uploading */
		/* 
		 * 6/1/15
		 * Two ways that I have been able to populate $file
		 * One way is using Input
		 * Another way is using Request
		 * I do not know the advantages/disadvantages to each, yet.
		 * 
		*/
		/* Use Request with Illuminate\Support\Facades\Request; */
		$file = Request::file('file_0');
		/* Or use Input */
		// $file = Input::file('file_0');
		/* I did not try the below */
		// $file = $request->file('file_0');
		
		// var_dump($file); // var dump to check what is stored in $file

		// Get file name
		$filename = $file->getClientOriginalName();
		// var_dump($filename); // var dump to check what is stored in $filename

		$extension = $file->getClientOriginalExtension(); // Retrieve file extension
		// var_dump($extension); // var dump to check what is stored in $extension

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

		$product = Product::findOrFail($product_id);
		// var_dump($product); // var dump product id

		// Storage::disk('local')->put($request->getFilename().'.'.$request->getClientOriginalExtension, $request);

		Storage::disk('productPictures')->put($file->getFilename().'.'.$extension, File::get($file));
		$photo = new ProductPhoto();
		// var_dump($entry);
		$photo->product_id = $product_id;
		$photo->mime = $file->getClientMimeType();
		$photo->original_filename = $file->getClientOriginalName();
		$photo->filename = $file->getFilename().'.'.$extension;
		// var_dump($entry);
		$product->productPhotos()->save($photo);

		// return 'Photos uploaded';
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
