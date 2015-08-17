<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model {

	/**
     * The Product function of this model.
     * ProductPhotos belong to products.
     * @return this - Product that the ProductPhoto belongs to.
     *
	 */
	public function Product()
	{
		return $this->belongsTo('App\Product');
	}

}