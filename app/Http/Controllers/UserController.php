<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use View;
use App\User;
use App\Product;
use Auth;

class UserController extends Controller {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		//
		$user = User::findOrFail($id);
		return View::make('user.dashboard')->withUser($user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * Display User Dashboard
	 *
	 * @param  int  $id - user id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		$products = $user->products()->get();
		return View::make('user.dashboard')
			->withUser($user)
			->withProducts($products);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
	 * @param  int  $id - user id
	 * @return Response
	 */
	public function getAccount($id)
	{
		$user = User::findOrFail($id);
		return View::make('user.account')->withUser($user);
	}
	public function getHelp($id)
	{
		$user = User::findOrFail($id);
		return View::make('user.help')->withUser($user);
	}
	public function getPerformance($id)
	{
		$user = User::findOrFail($id);
		return View::make('user.performance')->withUser($user);
	}
	public function getProfile($id)
	{
		$user = User::findOrFail($id);
		return View::make('user.profile')->withUser($user);
	}
	public function getSettings($id)
	{
		$user = User::findOrFail($id);
		return View::make('user.settings')->withUser($user);
	}
	public function getTransactions($id)
	{
		$user = User::findOrFail($id);
		return View::make('user.transactions')->withUser($user);
	}

}
