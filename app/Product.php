<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function productPhotos()
	{
		return $this->hasMany('App\ProductPhoto');
	}

	public function delete()
	{
		ProductPhoto::where('product_id', $this->id)->delete();
		parent::delete();
	}

}
