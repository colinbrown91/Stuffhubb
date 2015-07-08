<?php namespace App\Http\Controllers;

use App\User;
use View;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index($id)
	{

		//
		$user = User::findOrFail($id); //will return Model Not Found Exception Error if $id isnt found
		return View::make('home')->withUser('$user');
		// $name = User::get('name');
		// $user = new User();
		// $user->name = $name;
		// $user->save();
		// return view('home')->withUser('$user');
	}

}
