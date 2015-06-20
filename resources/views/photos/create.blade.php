@extends('layouts.main')
@section('content')

	<h2> {!! $product->product_name !!} </h2>
	<h2> {!! $product->price !!} </h2>

	{!! Form::open(array('route' => ['products.photos.store', $product->id], 'files' => 'true', 'enctype' => 'multipart/form-data')) !!}
		<div class='form-group'>
			@include('photos.partials._form')
		</div>
	{!! Form::close() !!}

@endsection