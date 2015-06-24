<?php namespace App; 

use Illuminate\Database\Eloquent\Model; 

class Product extends Model {

	/**
     * The user function of this model.
     * Products belong to users.
     * @var this - user that the product belongs to.
     *
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
     * The productPhotos function of this model.
     * productPhotos belong to products.
     * @var this - array of photos that belong to the product.
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

}
