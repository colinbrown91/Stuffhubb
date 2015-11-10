<?php namespace App; 

use Illuminate\Database\Eloquent\Model; 

class Product extends Model {

	/**
     * The user function of this model.
     * Products belong to users.
     * @return this - user that the product belongs to.
     *
	 */
	public function User()
	{
		return $this->belongsTo('App\User');
	}

	/**
     * The productPhotos function of this model.
     * Products have many ProductPhotos.
     * @return this - array of photos that belong to the product.
     *
     */
	public function productPhotos()
	{
		return $this->hasMany('App\ProductPhoto');
	}

    /**
     * The delete function of this model.
     * Capture all children of the parent when deleting.
     * 
     */
	public function delete()
	{
		ProductPhoto::where('product_id', $this->id)->delete();
		parent::delete();
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	// protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	// protected $fillable = ['name', 'email', 'password', 'month', 'day', 'year', 'gender' ];
	protected $fillable = ['product_name', 
						   'product_street',
						   'product_city',
						   'product_city',
						   'product_state',
						   'product_zipcode',
						   'base_price_per_hour',
						   'base_price_per_day',
						   'base_price_per_week',
						   'base_price_per_month',];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	// protected $hidden = ['password', 'remember_token'];

}
