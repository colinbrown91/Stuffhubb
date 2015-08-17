<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;


	/**
     * The products function of this model.
     * Users have many Products.
     * @return this - array of Products that belong to the User.
     *
     */
	public function products()
	{
		return $this->hasMany('App\Product');
	}
	/**
     * The productReservations function of this model.
     * Users have many ProductReservations.
     * @return this - array of ProductReservations that belong to the User.
     *
     */
	public function productReservations()
	{
		return $this->hasMany('App\ProductReservation');
	}
	/**
     * The delete function of this model.
     * Capture all children of the parent when deleting.
     * 
     */
	public function delete()
	{
		Product::where('user_id', $this->id)->delete();
		parent::delete();
	}


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'month', 'day', 'year', 'gender' ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

}
