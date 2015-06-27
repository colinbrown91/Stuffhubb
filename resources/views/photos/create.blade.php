@extends('layouts.main')
@section('content')

	<h2> {!! $product->product_name !!} </h2>
	<h2> {!! $product->price !!} </h2>

	{!! Form::open(array('route' => ['products.photos.store', $product->id], 'name' => 'photoUpload', 'files' => 'true', 'enctype' => 'multipart/form-data', 'onchange' => 'displayPhotos()')) !!}
		<div class='form-group'>
			@include('photos.partials._form')
		</div>
	{!! Form::close() !!}

	<div id="photoDisplay">

	</div>
	
	{!! Html::script('js/photos/display_photos.js') !!}

@endsection