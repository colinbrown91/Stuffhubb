<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model {

	/**
     * The Product function of this model.
     * Photos belong to products.
     * @var this - product that the photo belongs to.
     *
	 */
	public function Product()
	{
		return $this->belongsTo('App\Product');
	}

}