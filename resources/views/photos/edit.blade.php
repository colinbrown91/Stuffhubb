@extends('layouts.main')
@section('content')

	<h2> {!! $product->product_name !!} </h2>
	<h2> {!! $product->price !!} </h2>

	{!! Form::model($product_photo, array('route' => ['products.update', $product->id], 'method' => 'PUT')) !!}
		<div class='form-group'>
			@include('photos.partials._form')
		</div>
	{!! Form::close() !!}

@endsection